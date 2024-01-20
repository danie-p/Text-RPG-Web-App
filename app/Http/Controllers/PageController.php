<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function register_page() {
        return view('register');
    }

    public function home() {
        $successMessage = session('success');

        return view('home', ['successMessage' => $successMessage]);
    }

    public function create_character_page() {
        return view('create-character');
    }

    public function create_quest_page() {
        return view('create-quest');
    }

    public function create_item_page() {
        return view('create-item');
    }
}
