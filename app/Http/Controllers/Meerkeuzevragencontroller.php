<?php

namespace App\Http\Controllers;

use App\models\Meerkeuzevragen;
use App\models\Antwoord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\userhasmeerkeuzevraag;
use Illuminate\Support\Facades\DB;

class Meerkeuzevragencontroller extends Controller
{
    public function show()
    {
        //haalt alle meerkeuzevragen op
        $Meerkeuzevragen = Meerkeuzevragen::all();
        return view('vragen\Meerkeuzevragen', compact('Meerkeuzevragen'));
    }
    public function verwerkvraag(Request $request)
    {
        //verwerkt alle gegevens en maakt een nieuwe meerkeuzevraag aan
        $userId = auth()->user()->id;
        $meerkeuzeVraag = Meerkeuzevragen::create([
            'vraag' => $request->input('vraag'),
            'puntenTeVerdienen' => $request->input('punten'),
            'userID' => $userId,
        ]);
        //dit controleert of er maar 1 antwoord is gegeven
        $aantalCorrecteAntwoorden = 0;

        foreach ($request->input('opties') as $optie) {
            $tekst = $optie['tekst'];
            $isCorrect = isset($optie['is_correct']) ? $optie['is_correct'] : 0;

            if ($isCorrect) {
                $aantalCorrecteAntwoorden++;
                if ($aantalCorrecteAntwoorden > 1) {
                    return back()->with('error', 'Je mag maar 1 antwoord kiezen.');
                }
            }
        }
        //als er maar 1 antwoord is doorgestuurd maakt de antwoorden aan
        foreach ($request->input('opties') as $optie) {
            $tekst = $optie['tekst'];
            $isCorrect = isset($optie['is_correct']) ? $optie['is_correct'] : 0;
            Antwoord::create([
                'vraagID' => $meerkeuzeVraag->id,
                'AntwoordTekst' => $tekst,
                'IsCorrect' => $isCorrect,
            ]);
        }

        return Redirect::to('/');
    }

    public function showvraag()
    {
        //haalt alle vragen op die nog niet zijn beantwoord
        $vragenMetAntwoorden = Meerkeuzevragen::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('userhasmeerkeuzevraag')
                ->whereRaw('userhasmeerkeuzevraag.Vragen_idVragen = meerkeuzevragen.id')
                ->where('userhasmeerkeuzevraag.User_idUser', auth()->user()->id);
        })->get();


        return view('vragen\meerkeuzervraag', compact('vragenMetAntwoorden'));
    }
    public function control(Request $request)
    {
        if ($request->input('antwoord') === null) {
            return back()->with('niks', 'je moet wel een antwoord kiezen.');
        }
        $user = Auth::user();
        //sla het geselcteerde antwoord op in een variabele
        $geselecteerdeAntwoorden = $request->input('antwoord');
        //dit haalt eerst de vraag op. vervolgens checkt hij wat het juiste antwoord op die vraag is
        // tenslotte checkt hij of het geselecteerde antwoord hetzelfde is als het juiste antwoord
        $vraagID = $request->input('vraag_id');
        $juisteAntwoorden = Antwoord::where('vraagID', $vraagID)->where('IsCorrect', true)->pluck('antwoordID')->toArray();
        $correct = array_diff($juisteAntwoorden, $geselecteerdeAntwoorden) === array_diff($geselecteerdeAntwoorden, $juisteAntwoorden);
        //sla de poging op zodat de gebruiker het maar 1 keer kan proberen
        userhasmeerkeuzevraag::create([
            'User_idUser' => $user->id,
            'Vragen_idVragen' => $vraagID,
        ]);
        //als de gebruiker het goed heeft krijgt hij punten erbij
        // zo niet krijgt hij niks
        if ($correct) {
            $vraag = Meerkeuzevragen::find($vraagID);
            $puntenTeVerdienen = $vraag->puntenTeVerdienen;
            $huidigePunten = $user->punten;
            $nieuwePunten = $huidigePunten + $puntenTeVerdienen;
            $user->punten = $nieuwePunten;
            $user->save();
            return back()->with('success', 'Je hebt het juiste antwoord gekozen!');
        } else {
            return back()->with('error', 'Sorry, je hebt het verkeerde antwoord gekozen.');
        }
    }
}
