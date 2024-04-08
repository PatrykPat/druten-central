<?php

namespace App\Http\Controllers;

use App\Models\Nieuws;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\models\UserHasvragen;
use App\models\Feedbackvragen;
use App\models\Meerkeuzevragen;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FeedbackvragenController extends Controller
{
    //laat feedbackvragen.blade.php zien
    public function show()
    {
        // Haal alle feedbackvragen op uit de database
        $vragen = Feedbackvragen::all();

        // Geef de feedbackvragen door aan de view 'Feedbackvragen'
        return view('vragen\Feedbackvragen', compact('vragen'));
    }
    public function showAlleVragen()
    {
        // Haal alle feedbackvragen op uit de database
        $vragen = Feedbackvragen::all();
        // $meerkeuzevragen = Meerkeuzevragen::all();



        // Geef de feedbackvragen door aan de view 'Feedbackvragen'
        return view('vragen\Feedbackvragen', compact('vragen'));
    }

    public function showAnt()
    {
        // Haal alle gebruikers, rollen, antwoorden en feedbackvragen op uit de database
        $users = User::all();
        $roles = Role::all();
        $antwoorden = UserHasVragen::with('gebruiker')->get(); // gebruik 'with' om eager loading te doen
        $vragen = Feedbackvragen::all();

        // Geef de gebruikers, feedbackvragen en antwoorden door aan de view 'Feedbackantwoorden'
        return view('Feedbackantwoorden', compact('users', 'vragen', 'antwoorden'));
    }

    public function verwerkantwoord(Request $request)
    {
        $request->validate([
            'antwoord' => 'required',
            'rating' => 'required'
        ]);

        $userId = auth()->user()->id;
        $vraagId = $request->input('vraag_id');
        $antwoord = $request->input('antwoord');
        $rating = $request->input('rating');

        UserHasVragen::create([
            'User_idUser' => $userId,
            'Vragen_idVragen' => $vraagId,
            'antwoord' => $antwoord,
            'rating' => $rating
        ]);

        $vraag = Feedbackvragen::find($vraagId);
        $puntenTeVerdienen = $vraag->puntenTeVerdienen;
        //zoekt het id van de gebruiker op
        $gebruiker = User::find($userId);
        $huidigePunten = $gebruiker->punten;
        //telt de huidige punten op met de verdiende punten
        $nieuwePunten = $huidigePunten + $puntenTeVerdienen;
        $gebruiker->punten = $nieuwePunten;
        $gebruiker->save();

        return Redirect::to('/');
    }
    public function showAlles()
    {
        // Vandaag's datum
        $vandaag = Carbon::today();

        // Feedbackvragen van vandaag
        $recentNieuws = Nieuws::orderBy('created_at', 'desc')->take(3)->get();
        $feedbackvragen = Feedbackvragen::whereDate('created_at', $vandaag)->get();

        // Andere gegevens ophalen
        $nieuws = Nieuws::all();
        $meerkeuzevragen = Meerkeuzevragen::all();

        return view('dashboard', compact('feedbackvragen', 'recentNieuws', 'meerkeuzevragen'));
    }
    public function form()
    {
        return view('vragen\Feedbackvragenform');
    }
    public function send(Request $request)
    {
        // Valideer de ingediende gegevens
        $validatedData = $request->validate([
            'puntenTeVerdienen' => 'required|numeric',
            'title' => 'required|string',
            'beschrijving' => 'required|string',
        ]);

        // Maak een nieuwe instantie van het Coupon model
        $feedbackvragen = new feedbackvragen();
        $user = Auth::user();
        // Vul de eigenschappen van het model met de ingediende gegevens
        $feedbackvragen->beschrijving = $validatedData['beschrijving'];
        $feedbackvragen->title = $validatedData['title'];
        $feedbackvragen->puntenTeVerdienen = $validatedData['puntenTeVerdienen'];
        $feedbackvragen->user_userid = $user->id;

        // Sla de coupon op in de database
        $feedbackvragen->save();

        // Geef een succesbericht terug of leid de gebruiker door naar een andere pagina
        return redirect()->route('feedback.form')->with('success', 'vraag is succesvol opgeslagen.');
    }
}
