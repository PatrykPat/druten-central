<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuws;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;
use Carbon\Carbon;

class AgendaController extends Controller
{

  public function index()
  {
    // Haal alles op van het Nieuws model, stuur het naar de view als events
    $events = Nieuws::all();

    return view('nieuws.nieuwsAgenda', compact('events'));
  }

  public function showNieuwsItem($id)
  {
    // Logica om de nieuws items op te halen met het gegeven ID
    $nieuwsItem = Nieuws::find($id);

    if ($nieuwsItem) {
      return response()->json([
        'success' => true,
        'data' => $nieuwsItem
      ]);
    } else {
      return response()->json([
        'success' => false,
        'message' => 'Nieuws item not found.'
      ], 404); // Error bericht
    }
  }
}