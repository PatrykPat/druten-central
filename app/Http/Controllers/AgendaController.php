<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuws;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;

class AgendaController extends Controller
{
    public function index(Request $request)
{
    if ($request->ajax()) {
        $data = Nieuws::whereDate('datum', '>=', $request->start)
                  ->whereDate('datum', '<=', $request->end)
                  ->get(['id', 'title', 'datum']);

        return response()->json($data);
    }

    return view('nieuws.nieuwsAgenda');
}
}
