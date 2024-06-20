<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(6);

        return view('users.dashboard', compact('posts'));
    }
}
