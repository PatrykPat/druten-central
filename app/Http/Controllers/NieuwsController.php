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
        $users = User::all();
        $nieuws = Nieuws::all();
        return view('nieuws.nieuws', ['users' => $users], ['nieuws' => $nieuws]);
    }

    // Ga naar pagina voor het creëren van nieuws
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
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Create news item
        Nieuws::create([
            'user_iduser' => Auth::user()->id, // assuming you have authentication
            'title' => $request->input('title'),
            'beschrijving' => $request->input('beschrijving'),
            'image' => $imagePath,
            'datum' => $request->input('datum'),
        ]);

        return redirect('/nieuws')->with('success', 'News item created successfully.');
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
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public');
        } else {
            $imagePath = null;
        }

        // Find the nieuwsitem to update
        $nieuwsitem = Nieuws::findOrFail($id);

        // Update nieuwsitem
        $nieuwsitem->update([
            'title' => $request->input('title'),
            'beschrijving' => $request->input('beschrijving'),
            'image' => $imagePath,
            'datum' => $request->input('datum'),
        ]);

        return redirect('/nieuws')->with('success', 'News item updated successfully.');
    }
}
