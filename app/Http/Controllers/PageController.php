<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function castle() {
        return view('castle');
    }

    public function roleplay() {
        $posts = Post::all();
        return view('roleplay', ['posts' => $posts]);
    }

    public function register_page() {
        return view('register');
    }

    public function home() {
        return view('home');
    }
}
