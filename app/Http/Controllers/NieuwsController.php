<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nieuws;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Auth;

class NieuwsController extends Controller
{
    // Laat Nieuws pagina zien met Users en Nieuws tabel
    public function Index()
    {
        $roles = Role::all();
        $nieuws = Nieuws::with('gebruiker')->where('datum', '<', date('Y-m-d'))->get(); // gebruik 'with' om eager loading te doen
        $users = User::all();
        return view('nieuws.nieuwsArchief',compact('nieuws', 'users'), ['users' => $users], ['nieuws' => $nieuws]);
    }

    public function Kalender() {
        $users = User::all();
    
        // Krijg nieuwsitems van vandaag of later dan vandaag
        $nieuws = Nieuws::with('gebruiker')->where('datum', '>=', date('Y-m-d'))->get(); // gebruik 'with' om eager loading te doen
    
        return view('nieuws.nieuwsKalender', ['users' => $users, 'nieuws' => $nieuws]);
    }

    // Ga naar pagina voor het creÃ«ren van nieuws
    public function Create()
    {
        return view('nieuws.createNieuws');
    }

    // Sla je creatie van het nieuwsitem op
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required|string',
            'beschrijving' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'datum' => 'required|date',
            'postcode' => 'required|string'
        ]);

        // File upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create nieuws item
        Nieuws::create([
            'user_iduser' => Auth::user()->id,
            'title' => $request->input('title'),
            'beschrijving' => $request->input('beschrijving'),
            'image' => $imagePath,
            'datum' => $request->input('datum'),
            'postcode' => $request->input('postcode'),
        ]);

        return redirect('/nieuws/kalender')->with('success', 'News item created successfully.');
    }

    // Delete een nieuwsitem
    public function destroy($id)
    {
        $newsItem = Nieuws::findOrFail($id);
        $newsItem->delete();

        return redirect()->back()->with('success', 'News item deleted successfully.');
    }

    // Ga naar de edit pagina voor je nieuwsitem
    public function edit($id)
    {
        $nieuwsitem = Nieuws::findOrFail($id);
        return view('nieuws.NieuwsEdit', compact('nieuwsitem'));
    }

    // Verander je nieuwsitem na het invullen van de edit file
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'beschrijving' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'datum' => 'required|date',
            'postcode' => 'required|string'
        ]);

        // File upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Vind het nieuwsitem die geupdate moet worden
        $nieuwsitem = Nieuws::findOrFail($id);

        // Update nieuwsitem
        $nieuwsitem->update([
            'title' => $request->input('title'),
            'beschrijving' => $request->input('beschrijving'),
            'image' => $imagePath,
            'datum' => $request->input('datum'),
            'postcode' => $request->input('postcode')
        ]);

        return redirect('/nieuws/kalender')->with('success', 'News item updated successfully.');
    }

    public function filter(Request $request)
    {
        $userPostcode = $request->input('user_postcode');

        $users = User::all();
        $nieuws = Nieuws::query();

        // Filter per user als een user geselecteerd is
        if (!empty($userPostcode)) {
            $nieuws->whereHas('user', function ($query) use ($userPostcode) {
                $query->where('postcode', $userPostcode);
            });
        }

        $nieuws->whereDate('datum', '<', date('Y-m-d'));

        $filteredNieuws = $nieuws->get();

        return view('nieuws.nieuwsArchief', [
            'users' => $users,
            'nieuws' => $filteredNieuws,
            'selectedUserPostcode' => $userPostcode ?? null,
        ]);
    }

    public function filterKalender(Request $request)
    {
        $userPostcode = $request->input('user_postcode');

        $users = User::all();
        $nieuws = Nieuws::query();

        // Filter per user als een user geselecteerd is
        if (!empty($userPostcode)) {
            $nieuws->whereHas('user', function ($query) use ($userPostcode) {
                $query->where('postcode', $userPostcode);
            });
        }

        $nieuws->whereDate('datum', '>=', date('Y-m-d'));

        $filteredNieuws = $nieuws->get();

        return view('nieuws.nieuwsKalender', [
            'users' => $users,
            'nieuws' => $filteredNieuws,
            'selectedUserPostcode' => $userPostcode ?? null,
        ]);
    }

    public function entriesLastThreeDays() 
    {
        $nieuws = Nieuws::orderBy('datum', 'desc')->take(3)->get();

        return view('nieuws.nieuwsRecent', ['nieuws' => $nieuws]);
    }

    public function today()
    {
        $currentDate = now()->toDateString();

        $nieuws = Nieuws::whereDate('datum', $currentDate)->get();

        return view('dashboard', ['nieuws' => $nieuws]);
    }
}
