<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Haal alle gebruikers en rollen op uit de database
        $users = User::all();
        $roles = Role::all();
        
        // Geef de gebruikers en rollen door aan de view 'admin.users.index'
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        // Haal alle rollen op uit de database
        $roles = Role::all();
        
        // Geef de rollen door aan de view 'admin.users.create'
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Valideer de ingevoerde gebruikersgegevens
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'postcode' => ['required'],
            'role_id' => ['required'],
        ]);

        // Maak een nieuwe gebruiker aan
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'postcode' => $validated['postcode'],
        ]);

        // Vind de rol op basis van de meegegeven rol-ID
        $role = \Spatie\Permission\Models\Role::find($validated['role_id']);
        
        // Koppel de gebruiker aan de gevonden rol
        $user->syncRoles([$role]);

        // Redirect naar de gebruikersindexpagina
        return redirect()->route('admin.users.index');
    }
}