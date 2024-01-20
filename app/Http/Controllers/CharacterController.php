<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CharacterController extends Controller
{
    public function createCharacter(Request $request) {
        if (!auth()->user()) {
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autentifikácie!']);
        }

        // server-side validation
        // strip tags
        $incomingFields = $this->getFields($request);

        $incomingFields['user_id'] = auth()->id();

        $character = Character::create($incomingFields);
        $successMessage = 'Postava bola úspešne vytvorená!';

        return View::make('show-character', compact('character', 'successMessage'));
    }

    public function editWindow(Character $character) {
        $user = Auth::user();

        if (!$user) {
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autentifikácie!']);
        }

        if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('edit-any-character')) {
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autorizácie!']);
        }

        return view('edit-character', ['character' => $character]);
    }

    public function editCharacter(Character $character, Request $request) {
        $user = Auth::user();

        if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('edit-any-character')) {
            return View::make('show-character', compact('character'))->withErrors(['error' => 'Používateľ bez autorizácie!']);
        }

        $incomingFields = $this->getFields($request);

        $character->update($incomingFields);
        $successMessage = 'Postava bola úspešne upravená!';

        return View::make('show-character', compact('character', 'successMessage'));
    }

    public function deleteCharacter(Character $character, Request $request) {
        if ($request->isMethod('delete')) {

            $user = Auth::user();

            if ($user->id !== $character['user_id'] && !$user->hasPermissionTo('delete-any-character')) {
                return View::make('show-character', compact('character'))->withErrors(['error' => 'Používateľ bez autorizácie!']);
            }

            $character->posts()->delete();

            $character->delete();

            return redirect('/citizens')->with(['successMessage' => 'Postava úspešne vymazaná!']);
        }
        return redirect('/home')->withErrors(['error' => 'Operácia sa nepodarila!']);
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
        ], [
            'name.required' => 'Pole pre meno je povinné.',
            'age.required' => 'Pole pre vek je povinné.',
            'age.numeric' => 'Vek musí byť číslo.',
            'age.min' => 'Vek musí byť aspoň 1 rok.',
            'image_url.required' => 'Pole pre URL obrázka je povinné.',
            'image_url.url' => 'Zadaj platnú URL adresu pre obrázok.',
            'bio.required' => 'Pole pre životopis je povinné.',
            'bio.min' => 'Životopis musí mať aspoň 300 znakov.',
            'description.required' => 'Pole pre opis je povinné.',
            'description.min' => 'Opis musí mať aspoň 300 znakov.',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['surname'] = strip_tags($incomingFields['surname'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['image_url'] = strip_tags($incomingFields['image_url'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['bio'] = strip_tags($incomingFields['bio'], "<p></p> <br> <b></b> <i></i> <u></u>");
        $incomingFields['description'] = strip_tags($incomingFields['description'], "<p></p> <br> <b></b> <i></i> <u></u>");
        return $incomingFields;
    }
}
