<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddUser;
use App\Models\User;
use App\Models\Auth;

class AddUserController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:1,2,3',
        ]);

        AddUser::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            // Add any other necessary fields here
        ]);

        // Retrieve all users
        $users = User::all();

        // Pass the users data to the view
        return view('AddUser', compact('users'));
    }
}