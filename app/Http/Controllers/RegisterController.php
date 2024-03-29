<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        
        $user = User::create($attributes);

        // Récupère le rôle 'user' et l'attribue à l'utilisateur
        $defaultRole = Role::where('name', 'user')->first(); 
        $user->assignRole($defaultRole); 

        auth()->login($user);

        return redirect('/dashboard');
    }
}
