<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function createCharacter(Request $request) {
        if (!auth()->user()) {
            return redirect('/home');
        }

        // server-side validation
        // strip tags
        $incomingFields = $this->getFields($request);

        $incomingFields['user_id'] = auth()->id();

        $character = Character::create($incomingFields);
        return view('show-character', compact('character'));
    }

    public function editWindow(Character $character) {
        if (!auth()->user()) {
            return redirect('/home');
        }

        if (auth()->user()->id !== $character['user_id']) {
            return redirect('/home');
        }

        return view('edit-character', ['character' => $character]);
    }

    public function editCharacter(Character $character, Request $request) {
        if (auth()->user()->id !== $character['user_id']) {
            return view('show-character', compact('character'));
        }

        $incomingFields = $this->getFields($request);

        $character->update($incomingFields);
        return view('show-character', compact('character'));
    }

    public function deleteCharacter(Character $character, Request $request) {
        if ($request->isMethod('delete')) {

            if (auth()->user()->id !== $character['user_id']) {
                return view('show-character', compact('character'));
            }

            $character->delete();

            return redirect('/citizens');
        }
        return redirect('/home');
    }

    public function showCharacter($id) {
        $character = Character::findOrFail($id);
        return view('show-character', compact('character'));
    }

    public function showAllCharacters() {
        $characters = Character::orderBy('name')->orderBy('surname')->get();
        return view('citizens', compact('characters'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getFields(Request $request): array
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'surname' => 'nullable',
            'age' => 'required|numeric|min:1',
            'image_url' => 'required|url',
            'bio' => 'required|min:300',
            'description' => 'required|min:300',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['surname'] = strip_tags($incomingFields['surname']);
        $incomingFields['image_url'] = strip_tags($incomingFields['image_url']);
        $incomingFields['bio'] = strip_tags($incomingFields['bio']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        return $incomingFields;
    }
}
