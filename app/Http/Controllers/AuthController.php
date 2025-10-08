<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Le Champs Email est obligatoire',
            'password.required' => 'Le Champs mot de passe est obligatoire',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Connexion réussie');
        } else {
            return back()->with('error', 'Email ou mot de passe incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }



    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'nullable',
        ], [
            'email.required' => 'Le Champs Email est obligatoire',
        ]);
        try {
            $user = User::find(Auth::user()->id);
            $user->email = $request->input('email') ?? $user->email;
            $user->password = $request->input('password') ? Hash::make($request->input('password')) : $user->password;
            $user->save();

            return back()->with('success', 'Profil mis à jour avec succès');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du profil.');
        }
    }
}
