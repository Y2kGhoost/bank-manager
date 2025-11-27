<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirementController extends Controller
{
    public function create()
    {
        $comptes = Compte::with('client')->get();
        return view('virement.create', compact('comptes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'compte_source_id' => 'required|exists:comptes,id',
            'compte_destination_id' => 'required|exists:comptes,id|different:compte_source_id',
            'montant' => 'required|numeric|min:0.01'
        ]);

        $source = Compte::findOrFail($request->compte_source_id);
        $destination = Compte::findOrFail($request->compte_destination_id);
        $montant = $request->montant;

        // Vérification solde
        if ($source->solde < $montant) {
            return back()->withErrors([
                'montant' => 'Solde insuffisant ! Le compte émetteur n’a que ' . number_format($source->solde, 2) . ' DH.'
            ])->withInput();
        }

        // Transaction sécurisée
        DB::transaction(function () use ($source, $destination, $montant) {
            $source->decrement('solde', $montant);
            $destination->increment('solde', $montant);
        });

        return redirect()->route('virement.create')
                         ->with('success', 'Virement de ' . number_format($montant, 2) . ' DH effectué avec succès !');
    }
}