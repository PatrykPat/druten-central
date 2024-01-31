<?php

namespace App\Http\Controllers;

use App\Models\Feedbackvragen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AantalvragenController extends Controller
{
    public function overzichtBeantwoordeVragen()
    {
        $vragen = Feedbackvragen::all();
        $beantwoordeVragen = Feedbackvragen::select('feedbackvragen.id', DB::raw('GROUP_CONCAT(feedbackvragen.title) as titels'), DB::raw('COUNT(userhasvragen.User_idUser) as aantalBeantwoordeVragen'))
            ->leftJoin('userhasvragen', 'feedbackvragen.id', '=', 'userhasvragen.Vragen_idVragen')
            ->where('feedbackvragen.user_userid', auth()->user()->id) // Alleen vragen van de huidige gebruiker
            ->groupBy('feedbackvragen.id')
            ->orderBy('aantalBeantwoordeVragen', 'desc')
            ->get();

        return view('vragen/aantalvragen', compact('vragen'), ['beantwoordeVragen' => $beantwoordeVragen]);
    }
}
