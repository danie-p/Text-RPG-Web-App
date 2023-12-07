<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function castle() {
        return view('castle');
    }

    public function roleplay() {
        return view('roleplay');
    }

    public function register_page() {
        return view('register');
    }

    public function home() {
        return view('home');
    }
}
