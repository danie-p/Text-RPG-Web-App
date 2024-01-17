<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:200']
        ]);

        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'login-name' => 'required',
            'login-password' => 'required'
        ]);

        if (auth()->attempt(['name' => $incomingFields['login-name'], 'password' => $incomingFields['login-password']])) {
            $request->session()->regenerate();
        }

        return redirect()->back();
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function editProfile(Request $request) {
        if (!auth()->user() || !$request->isMethod('put')) {
            return redirect('/home');
        }

        $request->validate([
            'login-name' => ['required', 'min:3', 'max:20'],
            'login-email' => ['required', 'email']
        ]);

        // skontrolovat, ci zmenene meno/email sa zhoduje s aktualnym a ak ano, tak sa neuplatni Rule::unique, inak zvalidovat na unikatne meno/email
        if ($request['login-name'] !== auth()->user()->name) {
            $request->validate([
                'login-name' => Rule::unique('users', 'name')
            ]);
        }

        if ($request['login-email'] !== auth()->user()->email) {
            $request->validate([
                'login-email' => Rule::unique('users', 'email')
            ]);
        }

        $incomingFields = [
            'name' => $request->input('login-name'),
            'email' => $request->input('login-email')
        ];

        if ($request->filled('login-new-password')) {
            $request->validate([
                'login-old-password' => 'required', 'min:8', 'max:200',
                'login-new-password' => 'required', 'min:8', 'max:200',
            ]);

            // ak sa zadane stare heslo nezhoduje s aktualnym heslom pouzivatela
            if (!Hash::check($request['login-old-password'], auth()->user()->getAuthPassword())) {
                return redirect()->back()->withErrors(['login-old-password' => 'Incorrect old password']);
            }

            $incomingFields['password'] = Hash::make($request->input('login-new-password'));
        }

        auth()->user()->update($incomingFields);

        return redirect('/');
    }
}
