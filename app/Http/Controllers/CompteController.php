<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Compte;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comptes = Compte::with('client')->get();
        return view('comptes.index', compact('comptes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('nom')->get();
        return view('comptes.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rib' => 'required|string|unique:comptes,rib|max:255',
            'solde' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id'
        ]);

        Compte::create($request->all());

        return redirect()->route('comptes.index')
                         ->with('success', 'Compte créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compte $compte)
    {
        $clients = Client::orderBy('nom')->get();
        return view('comptes.edit', compact('compte', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compte $compte)
    {
        $request->validate([
            'rib' => 'required|string|max:255|unique:comptes,rib,' . $compte->id,
            'solde' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id'
        ]);

        $compte->update($request->all());

        return redirect()->route('comptes.index')
                         ->with('success', 'Compte modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compte $compte)
    {
        $compte->delete();
        return redirect()->route('comptes.index')
                         ->with('success', 'Compte supprimé avec succès !');
    }
}
