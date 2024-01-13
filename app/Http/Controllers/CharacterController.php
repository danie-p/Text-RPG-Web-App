<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function createCharacter(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'surname' => 'nullable',
            'age' => 'required|numeric',
            'image_url' => 'url',
            'bio' => 'required|min:300',
            'description' => 'required|min:300',
        ]);

        /*
        $incomingFields['bio'] = strip_tags($incomingFields['bio']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        */

        $incomingFields['user_id'] = auth()->id();

        Character::create($incomingFields);
        return redirect('/citizens');
    }

    public function showCharacter($id) {
        $character = Character::findOrFail($id);
        return view('show-character', compact('character'));
    }

    public function showAllCharacters()
    {
        $characters = Character::all();
        return view('citizens', compact('characters'));
    }
}
