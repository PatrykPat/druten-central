<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Feedbackvragen;
use App\models\UserHasvragen;
use App\models\User;
use Illuminate\Support\Facades\Redirect;

class FeedbackvragenController extends Controller
{
    //laat feedbackvragen.blade.php zien
    public function show()
    {
        $vragen = Feedbackvragen::all();
        return view('vragen\Feedbackvragen', compact('vragen'));
    }
    //deze funcite verwerkt alle informatie naar de database
    public function verwerkantwoord(Request $request)
    {
        $request->validate([
            'antwoord' => 'required',
        ]);

        $userId = auth()->user()->id;
        $vraagId = $request->input('vraag_id');
        $antwoord = $request->input('antwoord');

        UserHasVragen::create([
            'User_idUser' => $userId,
            'Vragen_idVragen' => $vraagId,
            'antwoord' => $antwoord,
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
