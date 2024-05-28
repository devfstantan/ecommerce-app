<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche la page de login
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * gère l'envoie du formulaire de login
     */
    public function authenticate(Request $request)
    {
        // 1- valider le formulaire
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = !!$request->remember;


        // 2- connexion de l'utilisateur
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();


            $home = Auth::user()->role === 'admin' ?
                'bo.index'
                : 'manager.index';
            // dd($home);
            // dd(Auth::user()->role); 
            return redirect()->route($home);
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrecte.',
        ])->onlyInput('email');
    }

    /**
     * Ferme la session
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('front.index');
    }
}
