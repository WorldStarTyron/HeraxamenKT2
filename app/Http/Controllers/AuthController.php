<?php

namespace App\Http\Controllers;

use App\Models\klanten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('Auth.Register');
    }

    public function showLogin()
    {
        return view('Auth.Login');
    }

    public function register(Request $request)
    {
        // valideer de invoer
        $validate = $request->validate([
            'klant_naam' => 'required',
            'klant_password' => 'required|min:6',
            'klant_email' => 'required|email|unique:klantens,klant_email',
            'klant_telefoon' => 'required|unique:klantens,klant_telefoon',
        ], [
            'klant_naam.required' => 'De naam is verplicht',
            'klant_email.required' => 'De email is verplicht',
            'klant_password.required' => 'De wachtwoord is verplicht',
            'klant_telefoon.required' => 'De telefoonnummer is verplicht',
            'klant_email.email' => 'De email moet een geldig emailadres zijn',
            'klant_email.unique' => 'De email bestaat al',
            'klant_telefoon.unique' => 'De telefoonnummer bestaat al',
        ]);

        // maak de klant aan in de database
        $klant = klanten::create([
            'klant_naam' => $request->klant_naam,
            'klant_password' => Hash::make($request->klant_password),
            'klant_email' => $request->klant_email,
            'klant_telefoon' => $request->klant_telefoon,
            'klant_role' => 'klant',
        ]);

        // log de klant in
        Auth::login($klant);

        // stuur naar de klanten homepagina
        return redirect()->route('Homepagina.index');
    }

    public function login(Request $request)
    {
        // valideer de invoer
        $validate = $request->validate([
            'klant_password' => 'required|min:6',
            'klant_email' => 'required|email',
        ], [
            'klant_email.required' => 'De email is verplicht',
            'klant_password.required' => 'De wachtwoord is verplicht',
            'klant_email.email' => 'De email moet een geldig emailadres zijn',
        ]);

        // probeer in te loggen met email en wachtwoord
        if (Auth::attempt([
            'klant_email' => $validate['klant_email'],
            'password' => $validate['klant_password'],
        ])) {
            $request->session()->regenerate();

            // check of de gebruiker een admin of klant is
            if (Auth::user()->klant_role === 'admin') {
                // admin gaat naar de admin homepagina
                return redirect()->route('Homepagina.index');
            }

            // klant gaat naar de klanten homepagina
            return redirect()->route('KlantenHomepagina.index');
        }

        // login mislukt, toon foutmelding
        throw ValidationException::withMessages([
            'klant_email' => 'De email of wachtwoord is onjuist',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();    // leeg de sessie
        $request->session()->regenerateToken(); // genereert een nieuwe token

        return redirect()->route('login'); // ga naar de loginpagina
    }
}
