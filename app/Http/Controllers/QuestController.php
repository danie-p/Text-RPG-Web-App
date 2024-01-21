<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class QuestController extends Controller
{
    public function createQuest(Request $request) {
        $user = Auth::user();

        if (!$user) {
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autentifikácie!']);
        }

        if (!$user->hasPermissionTo('manage-quest')) {
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autorizácie!']);
        }

        try {
            $incomingFields = $request->validate([
                'name' => 'required',
                'location' => 'required',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048',
                'body' => 'required'
            ], [
                'name.required' => 'Pole pre názov je povinné.',
                'location.required' => 'Pole pre lokáciu je povinné.',
                'image_path.image' => 'Nahraný súbor nie je obrázok.',
                'image_path.mimes' => 'Obrázok musí byť vo formáte JPEG, PNG, JPG, GIF, BMP, SVG alebo WebP.',
                'image_path.max' => 'Veľkosť obrázka nesmie presiahnuť 2048 KB.',
                'body.required' => 'Pole pre zadanie questu je povinné.'
            ]);
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }

        $image = $request->file('image_path');

        if ($image) {
            $imageName = 'quest-' . time() . '.' . $image->getClientOriginalExtension();

            // uploadnuty subor je ulozeny do images adresaru lokalneho public disku
            $image_path = $image->storeAs('images', $imageName, 'public');
            $incomingFields['image_path'] = $image_path;
        } else {
            $incomingFields['image_path'] = null;
        }

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['body'] = strip_tags($incomingFields['body'], "<p></p> <br> <b></b> <i></i> <u></u>");

        $quest = Quest::create($incomingFields);

        return redirect('/home')->with('success', 'Quest bol úspešne vytvorený!');   // zatial sa quest len vytvori, ale nezobrazi
    }

    public function showQuests() {
        $quests = Quest::all();
        return view('castle', compact('quests'));
    }
}
