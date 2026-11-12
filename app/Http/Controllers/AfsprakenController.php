<?php

namespace App\Http\Controllers;

use App\Models\Afspraken;
use App\Models\beurt;
use App\Models\klanten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AfsprakenController extends Controller
{
    public function index()
    {
        $afspraken = Afspraken::with('klanten')->paginate(10);

        return view('AfsprakenBeheer.AfsprakenPaginaBeheer', compact('afspraken'));
    }

    public function create()
    {
        $klanten = klanten::all();
        $beurten = beurt::where('beurt_datum', '>=', now()->toDateString())->get();

        return view('AfsprakenBeheer.AfsprakenToevoegen', compact('klanten', 'beurten'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'klant_naam' => 'required|string',
            'Afspraak_title' => 'required|string',
            'Afspraak_datum' => 'required|date',
            'Afspraak_omschrijving' => 'required|string',
        ], [
            'klant_naam.required' => 'Klant naam is verplicht',
            'Afspraak_title.required' => 'Titel is verplicht',
            'Afspraak_datum.required' => 'Datum is verplicht',
            'Afspraak_omschrijving.required' => 'Omschrijving is verplicht',
        ]);

        $klant = klanten::where('klant_naam', $request->klant_naam)->first();

        if (! $klant) {
            return redirect()->back()->withInput()->with('error', 'Klant niet gevonden!');
        }

        $bestaandeAfspraak = Afspraken::where('klant_id', $klant->klant_id)
            ->where('Afspraak_datum', $request->Afspraak_datum)
            ->first();

        if ($bestaandeAfspraak) {
            return redirect()->back()->withInput()->with('error', 'Deze klant heeft al een afspraak op deze datum!');
        }

        Afspraken::create([
            'klant_id' => $klant->klant_id,
            'Afspraak_title' => $request->Afspraak_title,
            'Afspraak_datum' => $request->Afspraak_datum,
            'Afspraak_omschrijving' => $request->Afspraak_omschrijving,
        ]);

        return redirect()->route('AfsprakenBeheer.index')->with('success', 'Afspraak succesvol aangemaakt!');
    }

    public function edit($afspraak_id)
    {
        $afspraak = Afspraken::findOrFail($afspraak_id);
        $klanten = klanten::all();

        return view('AfsprakenBeheer.AfsprakenAanpassen', compact('afspraak', 'klanten'));
    }

    public function update(Request $request, $afspraak_id)
    {
        $afspraak = Afspraken::findOrFail($afspraak_id);

        $request->validate([
            'klant_id' => 'required|exists:klantens,klant_id',
            'Afspraak_title' => 'required|string',
            'Afspraak_datum' => 'required|date',
            'Afspraak_omschrijving' => 'required|string',
        ], [
            'klant_id.required' => 'Kies een klant',
            'Afspraak_title.required' => 'Titel is verplicht',
            'Afspraak_datum.required' => 'Datum is verplicht',
            'Afspraak_omschrijving.required' => 'Omschrijving is verplicht',
        ]);

        $bestaandeAfspraak = Afspraken::where('klant_id', $request->klant_id)
            ->where('Afspraak_datum', $request->Afspraak_datum)
            ->where('afspraak_id', '!=', $afspraak_id)
            ->first();

        if ($bestaandeAfspraak) {
            return redirect()->back()->withInput()->with('error', 'Deze klant heeft al een afspraak op deze datum!');
        }

        $afspraak->update([
            'klant_id' => $request->klant_id,
            'Afspraak_title' => $request->Afspraak_title,
            'Afspraak_datum' => $request->Afspraak_datum,
            'Afspraak_omschrijving' => $request->Afspraak_omschrijving,
        ]);

        return redirect()->route('AfsprakenBeheer.index')->with('success', 'Afspraak is aangepast!');
    }

    public function destroy($afspraak_id)
    {
        $afspraak = Afspraken::findOrFail($afspraak_id);
        $afspraak->delete();

        return redirect()->route('AfsprakenBeheer.index')->with('success', 'Afspraak is verwijderd!');
    }

    public function klantIndex()
    {
        $klant = Auth::user();
        $afspraken = Afspraken::where('klant_id', $klant->klant_id)->with('beurten')->get();
        $beurten = beurt::where('beurt_datum', '>=', now()->toDateString())->get();

        return view('KlantenPagina.KlantenAfspraken', compact('afspraken', 'beurten'));
    }

    public function klantStore(Request $request)
    {
        $request->validate([
            'Afspraak_title' => 'required|string',
            'Afspraak_datum' => 'required|date|after_or_equal:today',
            'Afspraak_omschrijving' => 'required|string',
        ], [
            'Afspraak_title.required' => 'Kies een type onderhoud',
            'Afspraak_datum.required' => 'Datum is verplicht',
            'Afspraak_datum.after_or_equal' => 'Datum moet vandaag of later zijn',
            'Afspraak_omschrijving.required' => 'Omschrijving is verplicht',
        ]);

        $klant = Auth::user();

        $bestaandeAfspraak = Afspraken::where('klant_id', $klant->klant_id)
            ->where('Afspraak_datum', $request->Afspraak_datum)
            ->first();

        if ($bestaandeAfspraak) {
            return redirect()->back()->withInput()->with('error', 'U heeft al een afspraak op deze datum!');
        }

        $aantalAfspraken = Afspraken::where('Afspraak_datum', $request->Afspraak_datum)->count();
        $beurt = beurt::where('beurt_datum', $request->Afspraak_datum)
            ->where('beurt_naam', $request->Afspraak_title)
            ->first();

        if ($beurt && $aantalAfspraken >= $beurt->maximaal_aantal_auto) {
            return redirect()->back()->withInput()->with('error', 'De werkplaats is vol op deze datum! Kies een andere datum.');
        }

        Afspraken::create([
            'klant_id' => $klant->klant_id,
            'Afspraak_title' => $request->Afspraak_title,
            'Afspraak_datum' => $request->Afspraak_datum,
            'Afspraak_omschrijving' => $request->Afspraak_omschrijving,
        ]);

        return redirect()->route('KlantenAfspraken.index')->with('success', 'Afspraak succesvol ingepland!');
    }

    public function klantDestroy($afspraak_id)
    {
        $afspraak = Afspraken::where('afspraak_id', $afspraak_id)
            ->where('klant_id', Auth::user()->klant_id)
            ->firstOrFail();

        $afspraak->delete();

        return redirect()->route('KlantenAfspraken.index')->with('success', 'Afspraak is geannuleerd!');
    }
}
