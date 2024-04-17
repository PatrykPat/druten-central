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
    //functie om meerkeuzen.blade.php te laten zien
    public function show()
    {
        $Meerkeuzevragen = Meerkeuzevragen::all();
        return view('vragen\Meerkeuzevragen', compact('Meerkeuzevragen'));
    }
    //functie om vraag te sturen naar database
    public function verwerkvraag(Request $request)
    {
        // pakt de user id die is ingelogd
        $userId = auth()->user()->id;
        // maakt een nieuw record aan in meerkeuzevraag en vult met de gegevens vanuit de form
        $meerkeuzeVraag = Meerkeuzevragen::create([
            'vraag' => $request->input('vraag'),
            'puntenTeVerdienen' => $request->input('punten'), // Hier wordt de punten correct ingevoerd
            'userID' => $userId,
        ]);

        foreach ($request->input('opties') as $optie) {
            $tekst = $optie['tekst'];
            $isCorrect = isset($optie['is_correct']) ? $optie['is_correct'] : 0;
            // nieuw record voor antwoord
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
        $user = Auth::user();
        $geselecteerdeAntwoorden = $request->input('antwoord');

        // Haal de juiste antwoorden op voor de vraag
        $vraagID = $request->input('vraag_id');
        $juisteAntwoorden = Antwoord::where('vraagID', $vraagID)->where('IsCorrect', true)->pluck('antwoordID')->toArray();
        // Controleer goede antwoord
        $correct = array_diff($juisteAntwoorden, $geselecteerdeAntwoorden) === array_diff($geselecteerdeAntwoorden, $juisteAntwoorden);

        userhasmeerkeuzevraag::create([
            'User_idUser' => $user->id,
            'Vragen_idVragen' => $vraagID,
        ]);

        if ($correct) {
            $vraag = Meerkeuzevragen::find($vraagID);
            $puntenTeVerdienen = $vraag->puntenTeVerdienen;
            //zoekt het id van de gebruiker op
            $huidigePunten = $user->punten;
            //telt de huidige punten op met de verdiende punten
            $nieuwePunten = $huidigePunten + $puntenTeVerdienen;
            $user->punten = $nieuwePunten;
            $user->save();
            return back()->with('success', 'Je hebt het juiste antwoord gekozen!');
        } else {
            return back()->with('error', 'Sorry, je hebt het verkeerde antwoord gekozen.');
        }
    }
}
