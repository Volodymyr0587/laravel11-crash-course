<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

        event(new Registered($user));

        if ($request->subscribe) {
            event(new UserSubscribed($user));
        }
        // Redirect
        return redirect()->route('dashboard');
    }

    // Enail Verification Notice route
    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    // Enail Verification Handler route
    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard');
    }

    // Resending the Verification Email
    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function login(Request $request)
    {
        //% Validate
        $fields = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required']
        ]);

        //% attempt to login the user
        if (! Auth::attempt($fields)) {
            throw ValidationException::withMessages([
                'failed'=> 'Sorry, those credentials do not match.',
            ]);
        }

        //% regenerate the session token
        request()->session()->regenerate();

        //% redirect
        return redirect()->intended('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
