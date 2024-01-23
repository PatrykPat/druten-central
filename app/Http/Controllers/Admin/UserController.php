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
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users'), compact('roles'));
    }

    public function create(){
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
{
    // Validate user data
    $validated = $request->validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required'],
        'role_id' => ['required'],
    ]);

    // Create a new user
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $role = \Spatie\Permission\Models\Role::find($validated['role_id']);
$user->syncRoles([$role]);

    // Redirect to the user index page
    return redirect()->route('admin.users.index');
}
    
}
