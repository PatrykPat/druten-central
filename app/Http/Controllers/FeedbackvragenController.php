<?php

namespace App\Http\Controllers;

use App\models\Antwoord;
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
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class FeedbackvragenController extends Controller
{
    public function show()
    {
        //haal allle vragen op die de gebruiker nog niet heeft beantwoord
        $vragen = Feedbackvragen::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('userhasvragen')
                ->whereRaw('userhasvragen.Vragen_idVragen = feedbackvragen.id')
                ->where('userhasvragen.User_idUser', auth()->user()->id);
        })->get();

        return view('vragen\Feedbackvragen', compact('vragen'));
    }

    public function showAlleVragen()
    {
        $vragen = Feedbackvragen::all();

        return view('vragen\Feedbackvragen', compact('vragen'));
    }

    public function showAnt()
    {
        //laat zien wat elke gebruiker heeft beantwoord op een feedbackvraag
        $users = User::all();
        $roles = Role::all();
        $antwoorden = UserHasVragen::with('gebruiker')->get();
        $vragen = Feedbackvragen::orderBy('id', 'desc')->get();
        return view('Feedbackantwoorden', compact('users', 'vragen', 'antwoorden'));
    }

    public function verwerkantwoord(Request $request)
    {
        //check of de doorgestuurde gegevens kloppen
        $request->validate([
            'antwoord' => 'required',
            'rating' => 'required'
        ]);
        //stop alle gegevens in variabelen
        //user haalt hij los op en vraag werd ontzichtbaar doorgestuurd vandaar dat ze niet hierboven staan
        $userId = auth()->user()->id;
        $vraagId = $request->input('vraag_id');
        $antwoord = $request->input('antwoord');
        $rating = $request->input('rating');
        // maak nieuwe rij aan 
        UserHasVragen::create([
            'User_idUser' => $userId,
            'Vragen_idVragen' => $vraagId,
            'antwoord' => $antwoord,
            'rating' => $rating
        ]);
        // telt de punten die bij de rvaag horen bij het totaal van de user op
        $vraag = Feedbackvragen::find($vraagId);
        $puntenTeVerdienen = $vraag->puntenTeVerdienen;
        $gebruiker = User::find($userId);
        $huidigePunten = $gebruiker->punten;
        $nieuwePunten = $huidigePunten + $puntenTeVerdienen;
        $gebruiker->punten = $nieuwePunten;
        $gebruiker->save();

        return Redirect::to('/');
    }
    public function showAlles()
    {
        $vandaag = Carbon::today();
        //pakt de meest recente nieuws en feedbackvraag
        $recentNieuws = Nieuws::orderBy('created_at', 'desc')->take(1)->get();
        $feedbackvragen = Feedbackvragen::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('userhasvragen')
                ->whereRaw('userhasvragen.Vragen_idVragen = feedbackvragen.id')
                ->where('userhasvragen.User_idUser', auth()->user()->id);
        })->get();
        //pakt de meest recente meerkeuzevraag die nog niet is beantwoord 
        $meerkeuzevragen = Meerkeuzevragen::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('userhasmeerkeuzevraag')
                ->whereRaw('userhasmeerkeuzevraag.Vragen_idVragen = meerkeuzevragen.id')
                ->where('userhasmeerkeuzevraag.User_idUser', auth()->user()->id);
        })->take(1)->get();


        return view('dashboard', compact('feedbackvragen', 'recentNieuws', 'meerkeuzevragen'));
    }
    public function form()
    {
        return view('vragen\Feedbackvragenform');
    }
    public function send(Request $request)
    {
        //checkt of alle data vereist aan de eisen
        $validatedData = $request->validate([
            'puntenTeVerdienen' => 'required|numeric',
            'title' => 'required|string',
            'beschrijving' => 'required|string',
        ]);
        //maakt nieuwe feedbackvraag aan en vult de kolommen met de gegevens
        $feedbackvragen = new feedbackvragen();
        $user = Auth::user();
        $feedbackvragen->beschrijving = $validatedData['beschrijving'];
        $feedbackvragen->title = $validatedData['title'];
        $feedbackvragen->puntenTeVerdienen = $validatedData['puntenTeVerdienen'];
        $feedbackvragen->user_userid = $user->id;

        $feedbackvragen->save();

        return redirect()->route('feedback.form')->with('success', 'vraag is succesvol opgeslagen.');
    }
}
