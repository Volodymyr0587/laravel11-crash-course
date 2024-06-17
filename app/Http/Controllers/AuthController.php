<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
       // Validate
       $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:3']
       ]);

       dd('ok');

       // Register

       // Login

       // Redirect
    }
}
