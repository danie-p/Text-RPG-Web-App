<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quest;
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

    public function manage_quest_page() {
        $quests = Quest::orderBy('name')->get();
        return view('manage-quest', compact('quests'));
    }

    public function manage_item_page() {
        return view('manage-item');
    }

    public function forest() {
        $quests = Quest::all();
        return view('forest', compact('quests'));
    }

    public function town() {
        $quests = Quest::all();
        return view('town', compact('quests'));
    }
}
