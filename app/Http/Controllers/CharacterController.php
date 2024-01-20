<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        if (!$user) {
            return redirect('/home');
        }

        if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('edit-any-character')) {
            return redirect('/home');
        }

        return view('edit-character', ['character' => $character]);
    }

    public function editCharacter(Character $character, Request $request) {
        $user = Auth::user();

        if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('edit-any-character')) {
            return view('show-character', compact('character'));
        }

        $incomingFields = $this->getFields($request);

        $character->update($incomingFields);
        return view('show-character', compact('character'));
    }

    public function deleteCharacter(Character $character, Request $request) {
        if ($request->isMethod('delete')) {

            $user = Auth::user();

            if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('delete-any-character')) {
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

        $incomingFields['name'] = strip_tags($incomingFields['name'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['surname'] = strip_tags($incomingFields['surname'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['image_url'] = strip_tags($incomingFields['image_url'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['bio'] = strip_tags($incomingFields['bio'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['description'] = strip_tags($incomingFields['description'], "<p></p> <br> <b></b> <i></i> <u></u>");
        return $incomingFields;
    }
}
