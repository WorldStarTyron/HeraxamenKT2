<?php

namespace App\Http\Controllers;

use App\Models\Afspraken;
use App\Models\beurt;
use Illuminate\Http\Request;

class BeurtController extends Controller
{
    public function index()
    {
        $beurten = beurt::paginate(10);

        return view('BeurtBeheren.BeurtPaginaBeheren', compact('beurten'));
    }

    public function create()
    {
        $afspraken = Afspraken::all();

        return view('BeurtBeheren.BeurtToevoegen', compact('afspraken'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'afspraak_id' => 'nullable|exists:afsprakens,afspraak_id',
            'beurt_naam' => 'required|string',
            'beurt_datum' => 'required|date',
            'beurt_tijd' => 'required',
            'maximaal_aantal_auto' => 'required|integer|min:1',
        ], [
            'beurt_naam.required' => 'Beurt naam is verplicht',
            'beurt_datum.required' => 'Datum is verplicht',
            'beurt_tijd.required' => 'Tijd is verplicht',
            'maximaal_aantal_auto.required' => 'Maximaal aantal autos is verplicht',
            'maximaal_aantal_auto.min' => 'Minimaal 1 auto',
        ]);

        beurt::create([
            'afspraak_id' => $request->afspraak_id ?: null,
            'beurt_naam' => $request->beurt_naam,
            'beurt_datum' => $request->beurt_datum,
            'beurt_tijd' => $request->beurt_tijd,
            'maximaal_aantal_auto' => $request->maximaal_aantal_auto,
        ]);

        return redirect()->route('BeurtBeheren.index')->with('success', 'Beurt succesvol toegevoegd!');
    }

    public function edit($beurt_id)
    {
        $beurt = beurt::findOrFail($beurt_id);
        $afspraken = Afspraken::all();

        return view('BeurtBeheren.BeurtAanpassen', compact('beurt', 'afspraken'));
    }

    public function update(Request $request, $beurt_id)
    {
        $beurt = beurt::findOrFail($beurt_id);

        $request->validate([
            'afspraak_id' => 'nullable|exists:afsprakens,afspraak_id',
            'beurt_naam' => 'required|string',
            'beurt_datum' => 'required|date',
            'beurt_tijd' => 'required',
            'maximaal_aantal_auto' => 'required|integer|min:1',
        ], [
            'beurt_naam.required' => 'Beurt naam is verplicht',
            'beurt_datum.required' => 'Datum is verplicht',
            'beurt_tijd.required' => 'Tijd is verplicht',
            'maximaal_aantal_auto.required' => 'Maximaal aantal autos is verplicht',
        ]);

        $beurt->update([
            'afspraak_id' => $request->afspraak_id ?: null,
            'beurt_naam' => $request->beurt_naam,
            'beurt_datum' => $request->beurt_datum,
            'beurt_tijd' => $request->beurt_tijd,
            'maximaal_aantal_auto' => $request->maximaal_aantal_auto,
        ]);

        return redirect()->route('BeurtBeheren.index')->with('success', 'Beurt is aangepast!');
    }

    public function destroy($beurt_id)
    {
        $beurt = beurt::findOrFail($beurt_id);
        $beurt->delete();

        return redirect()->route('BeurtBeheren.index')->with('success', 'Beurt is verwijderd!');
    }
}
