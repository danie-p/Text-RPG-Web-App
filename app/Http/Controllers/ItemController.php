<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ItemController extends Controller
{
    public function createItem(Request $request) {
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
                'price' => 'required|numeric|min:0',
                'effect' => 'required',
                'category_id' => 'required',
                'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,bmp,svg,webp|max:2048'
            ], [
                'name.required' => 'Pole pre názov je povinné.',
                'price.required' => 'Pole pre cenu je povinné.',
                'price.numeric' => 'Pole pre cenu musí byť číselné.',
                'price.min' => 'Cena musí byť najmenej 0.',
                'effect.required' => 'Pole pre efekt je povinné.',
                'category_id.required' => 'Pole pre kategóriu je povinné.',
                'image_path.image' => 'Nahraný súbor nie je obrázok.',
                'image_path.mimes' => 'Obrázok musí byť vo formáte JPEG, PNG, JPG, GIF, BMP, SVG alebo WebP.',
                'image_path.max' => 'Veľkosť obrázka nesmie presiahnuť 2048 KB.'
            ]);
        } catch (ValidationException $exception) {
            return redirect()->back()->withErrors($exception->errors())->withInput();
        }

        $image = $request->file('image_path');

        if ($image) {
            $imageName = 'item-' . time() . '.' . $image->getClientOriginalExtension();
            $image_path = $image->storeAs('images', $imageName, 'public');
            $incomingFields['image_path'] = $image_path;
        } else {
            $incomingFields['image_path'] = null;
        }

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['effect'] = strip_tags($incomingFields['effect'], "<p></p> <br> <b></b> <i></i> <u></u>");

        $item = Item::create($incomingFields);

        return redirect('/home')->with('success', 'Predmet bol úspešne vytvorený!');
    }
}
