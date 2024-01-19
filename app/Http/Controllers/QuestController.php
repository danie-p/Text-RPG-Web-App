<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function showQuests() {
        $quests = Quest::all();
        return view('castle', compact('quests'));
    }
}
