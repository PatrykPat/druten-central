<?php

namespace App\Http\Controllers;

use App\models\Meerkeuzevragen;
use App\models\Antwoord;
use Illuminate\Http\Request;

class Meerkeuzevragencontroller extends Controller
{
    public function show()
    {
        $Meerkeuzevragen = Meerkeuzevragen::all();
        return view('vragen\Meerkeuzevragen', compact('Meerkeuzevragen'));
    }

    public function verwerkvraag(Request $request)
    {
        $userId = auth()->user()->id;
        // Opslaan van meerkeuzevraag met gebruikers-ID
        $meerkeuzeVraag = Meerkeuzevragen::create([
            'vraag' => $request->input('vraag'),
            'userID' => auth()->user()->id,
        ]);

        // Opslaan van antwoordopties
        foreach ($request->input('opties') as $optie) {
            $tekst = $optie['tekst'];
            $isCorrect = isset($optie['is_correct']) ? $optie['is_correct'] : 0;
            Antwoord::create([
                'vraagID' => $meerkeuzeVraag->id,
                'AntwoordTekst' => $tekst,
                'IsCorrect' => $isCorrect,
            ]);
        }
    }
}
