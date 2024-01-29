<?php

namespace App\Http\Controllers;

use App\models\Meerkeuzevragen;
use App\models\Antwoord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class Meerkeuzevragencontroller extends Controller
{
    //functie om meerkeuzen.blade.php te laten zien
    public function show()
    {
        $Meerkeuzevragen = Meerkeuzevragen::all();
        return view('vragen\Meerkeuzevragen', compact('Meerkeuzevragen'));
    }
    //functie om vraag te sturen naar database
    public function verwerkvraag(Request $request)
    {
        //pakt de user id die is ingelogt
        $userId = auth()->user()->id;
        //maakt een nieuw record aan in meerkeuzevraag en vult de met de gegevens vanuit de form
        $meerkeuzeVraag = Meerkeuzevragen::create([
            'vraag' => $request->input('vraag'),
            'userID' => $userId,
        ]);

        foreach ($request->input('opties') as $optie) {
            $tekst = $optie['tekst'];
            $isCorrect = isset($optie['is_correct']) ? $optie['is_correct'] : 0;
            //nieuw record voor antwoord
            Antwoord::create([
                'vraagID' => $meerkeuzeVraag->id,
                'AntwoordTekst' => $tekst,
                'IsCorrect' => $isCorrect,
            ]);

        }
        return Redirect::to('/');
    }
}
