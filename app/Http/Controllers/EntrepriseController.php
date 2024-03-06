<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprises.index', compact('entreprises'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'raison_sociale' => 'required',
            // Ajoutez les autres règles de validation ici
        ]);

        Entreprise::create($request->all());
        return redirect('/entreprises');
    }

    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

    public function update(Request $request, Entreprise $entreprise)
    {
        // Validation des données
        $request->validate([
            'raison_sociale' => 'required',
            // Ajoutez les autres règles de validation ici
        ]);

        $entreprise->update($request->all());
        return redirect('/entreprises');
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();
        return redirect('/entreprises');
    }
}
