<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\models\UserHasvragen;
use App\models\Feedbackvragen;
use Illuminate\Support\Facades\Redirect;

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
}
