<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Feedbackvragen;
use App\models\UserHasvragen;
use App\models\User;

class FeedbackvragenController extends Controller
{
    public function show()
    {
        $vragen = Feedbackvragen::all();
        return view('Feedbackvragen', compact('vragen'));
    }
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

        $gebruiker = User::find($userId);
        $huidigePunten = $gebruiker->punten;

        $nieuwePunten = $huidigePunten + $puntenTeVerdienen;
        $gebruiker->punten = $nieuwePunten;
        $gebruiker->save();

        return redirect()->back()->with('success', 'Antwoord succesvol opgeslagen.');
    }
}
