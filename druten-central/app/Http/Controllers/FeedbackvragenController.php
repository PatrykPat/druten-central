<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Feedbackvragen;
use App\models\UserHasvragen;

class FeedbackvragenController extends Controller
{
    public function show()
    {
        $vragen = Feedbackvragen::all();
        return view('Feedbackvragen', compact('vragen'));
    }
    public function verwerkantwoord(Request $request)
    {
        // Valideer het formulier, indien nodig
        $request->validate([
            'antwoord' => 'required', // Voeg eventuele andere validatieregels toe
        ]);

        // Haal de gebruikersinvoer op
        $userId = auth()->user()->id; // Haal de huidige gebruikers-ID op
        $vraagId = $request->input('vraag_id'); // Zorg ervoor dat je de juiste naam gebruikt voor het veld in je formulier
        $antwoord = $request->input('antwoord');

        // Sla het antwoord op in de database
        UserHasVragen::create([
            'User_idUser' => $userId,
            'Vragen_idVragen' => $vraagId,
            'antwoord' => $antwoord,
        ]);

        // Voeg eventuele verdere logica toe, bijvoorbeeld het tonen van een succesbericht

        return redirect()->back()->with('success', 'Antwoord succesvol opgeslagen.');
    }
}
