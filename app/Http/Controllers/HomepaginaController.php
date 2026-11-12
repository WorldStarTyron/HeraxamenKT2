<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepaginaController extends Controller
{
    public function index(){
        return view ('Homepagina.Homepagina');
    }

    public function klantenHomepagina(){
        return view ('KlantenPagina.KlantenHomepagina');
    }
}
