<?php

namespace App\Http\Controllers;

use App\Models\klanten;
use Illuminate\Http\Request;

class KlantenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $KlantRole = klanten::$klantRoles;
        $klanten = klanten::paginate(10);
        return view('KlantenBeheer.klantenPaginaBeheer', compact('KlantRole','klanten'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $KlantRole = klanten::$klantRoles;
        return view ('KlantenBeheer.KlantenToevoegen', compact('KlantRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $valideer = $request->validate([
            'klant_naam' => 'required|string',
            'klant_email' => 'required|email',
            'klant_telefoon' => 'required',
             'klant_role' => 'required',
        ],[
            'klant_naam.required' => 'Naam is verplicht',
            'klant_email.required' => 'Email is verplicht',
            'klant_telefoon.required' => 'Telefoonnummer is verplicht',
            'klant_role.required' => 'Rol is verplicht',
        ]);

        klanten::create([
        'klant_naam' => $request->klant_naam,
        'klant_email' => $request->klant_email,
        'klant_telefoon' => $request->klant_telefoon,
        'klant_password' => bcrypt('klant1234'),
        'klant_role' => $request->klant_role,
        ]);


        return redirect()->route('KlantenBeheer.index')->with('success', 'Klant succesvol toegevoegd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(klanten $klanten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($klant_id)
    {
          $findKlant = klanten::findOrFail($klant_id);
          $KlantRole = klanten::$klantRoles;
          return view('KlantenBeheer.KlantenAanpassen', compact('findKlant','KlantRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $klant_id)
    {
        $findKlant = klanten::findOrFail($klant_id);

            $validate = $request->validate([
            'klant_naam' => 'required|string',
            'klant_email' => 'required|email',
            'klant_telefoon' => 'required',
             'klant_role' => 'required',
        ],[
            'klant_naam.required' => 'Naam is verplicht',
            'klant_email.required' => 'Email is verplicht',
            'klant_telefoon.required' => 'Telefoonnummer is verplicht',
            'klant_role.required' => 'Rol is verplicht',
        ]);

        $findKlant->update($validate);
        return redirect()->route('KlantenBeheer.index')->with('success', 'Klant is aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($klant_id)
    {
        $findKlant = klanten::findOrFail($klant_id);
        $findKlant->delete();
        return redirect()->route('KlantenBeheer.index')->with('success', 'Klant is verwijderd');
    }
}
