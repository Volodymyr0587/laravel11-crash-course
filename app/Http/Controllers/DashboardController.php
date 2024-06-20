<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate(6);

        return view('users.dashboard', compact('posts'));
    }

    public function userPosts(User $user)
    {
        $userPosts = $user->posts()->latest()->paginate(6);

        return view('users.posts', compact('userPosts', 'user'));
    }
}
