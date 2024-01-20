<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    public function register(Request $request) {
        try {
            $incomingFields = $request->validate([
                'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:8', 'max:200']
            ], [
                'name.required' => 'Pole pre meno je povinné.',
                'name.min' => 'Dĺžka mena musí byť minimálne 3 znaky.',
                'name.max' => 'Dĺžka mena nesmie presiahnuť 20 znakov.',
                'name.unique' => 'Zadané meno už má iný používateľ, vyber iné.',
                'email.required' => 'Pole pre e-mail je povinné.',
                'email.email' => 'Zadaj platnú e-mailovú adresu.',
                'email.unique' => 'Zadaný e-mail už má iný používateľ, vyber iný.',
                'password.required' => 'Pole pre heslo je povinné.',
                'password.min' => 'Dĺžka hesla musí byť minimálne 8 znakov.',
                'password.max' => 'Dĺžka hesla nesmie presiahnuť 200 znakov.',
            ]);
        } catch (ValidationException $exception) {
            return redirect('/register')->withErrors($exception->errors());
        }

        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);

        return redirect('/home')->with('success', 'Registrácia bola úspešná!');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'login-name' => 'required',
            'login-password' => 'required'
        ], [
            'login-name.required' => 'Pole pre meno je povinné.',
            'login-password.required' => 'Pole pre heslo je povinné.',
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
            return redirect('/home')->withErrors(['error' => 'Používateľ bez autentifikácie!']);
        }

        $request->validate([
            'login-name' => ['required', 'min:3', 'max:20'],
            'login-email' => ['required', 'email']
        ], [
            'login-name.required' => 'Pole pre meno je povinné.',
            'login-name.min' => 'Dĺžka mena musí byť minimálne 3 znaky.',
            'login-name.max' => 'Dĺžka mena nesmie presiahnuť 20 znakov.',
            'login-email.required' => 'Pole pre e-mail je povinné.',
            'login-email.email' => 'Zadaj platnú e-mailovú adresu.',
        ]);

        // skontrolovat, ci zmenene meno/email sa zhoduje s aktualnym a ak ano, tak sa neuplatni Rule::unique, inak zvalidovat na unikatne meno/email
        if ($request['login-name'] !== auth()->user()->name) {
            $request->validate([
                'login-name' => Rule::unique('users', 'name')
            ], [
                'login-name.unique' => 'Zadané meno už má iný používateľ, vyber iné.',
            ]);
        }

        if ($request['login-email'] !== auth()->user()->email) {
            $request->validate([
                'login-email' => Rule::unique('users', 'email')
            ], [
                'login-email.unique' => 'Zadaný e-mail už má iný používateľ, vyber iný.',
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
            ], [
                'login-old-password.required' => 'Pole pre staré heslo je povinné.',
                'login-old-password.min' => 'Minimálna dĺžka starého hesla je 8 znakov.',
                'login-old-password.max' => 'Maximálna dĺžka starého hesla je 200 znakov.',

                'login-new-password.required' => 'Pole pre nové heslo je povinné.',
                'login-new-password.min' => 'Minimálna dĺžka nového hesla je 8 znakov.',
                'login-new-password.max' => 'Maximálna dĺžka nového hesla je 200 znakov.',
            ]);

            // ak sa zadane stare heslo nezhoduje s aktualnym heslom pouzivatela
            if (!Hash::check($request['login-old-password'], auth()->user()->getAuthPassword())) {
                return redirect()->back()->withErrors(['login-old-password' => 'Nesprávne staré heslo!']);
            }

            $incomingFields['password'] = Hash::make($request->input('login-new-password'));
        }

        auth()->user()->update($incomingFields);

        return redirect()->route('home')->with('success', 'Profil bol úspešne upravený!');
    }
}
