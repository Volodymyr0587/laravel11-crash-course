<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
       // Validate
       $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:3']
       ]);
       // Register
       $user = User::create($fields);
       // Login
       Auth::login($user);
       // Redirect
       return redirect()->route('home');

    }
}
