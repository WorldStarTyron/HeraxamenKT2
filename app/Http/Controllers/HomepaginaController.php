<?php

namespace App\Http\Controllers;

use App\Models\Afspraken;

class HomepaginaController extends Controller
{
    public function index()
    {
        $afspraken = Afspraken::with(['klanten', 'beurten'])->paginate(10);

        return view('Homepagina.Homepagina', compact('afspraken'));
    }

    public function klantenHomepagina()
    {
        return view('KlantenPagina.KlantenHomepagina');
    }
}
