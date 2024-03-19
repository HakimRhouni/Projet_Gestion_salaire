<?php

namespace App\Http\Controllers;

use App\Models\Versement;
use Illuminate\Http\Request;
use App\Models\Periode;

class VersementController extends Controller
{
    public function index($id_periode)
    {
        // Récupérer l'id de la société à partir de la période
        $id_societe = Periode::findOrFail($id_periode)->id_societe;
    
        // Récupérer les versements pour la période spécifiée
        $versements = Versement::where('id_periode', $id_periode)->get();
    
        // Retourner la vue avec les versements et l'id de la société
        return view('pages.versements', compact('versements', 'id_periode', 'id_societe'));
    }
    public function create($id_periode)
{
    // Récupérer l'id de la société à partir de la période
    $id_societe = Periode::findOrFail($id_periode)->id_societe;

    // Retourner la vue avec les données nécessaires
    return view('pages.create_Versements', compact('id_periode', 'id_societe'));
}

    public function store(Request $request, $id_periode,$id_societe)
    {
        // Validation des données
        $request->validate([
            'mois' => 'required|string',
            'reference' => 'required|string',
            'date_versement' => 'required|date',
            'mode_paiement' => 'required|string',
            'numero_quittance' => 'required|string',
            'principale' => 'required|numeric',
            'penalite' => 'required|numeric',
            'majorations' => 'required|numeric',
            'total_verse' => 'required|numeric',
        ]);

        // Création d'un nouveau versement
        $versement = new Versement();
        $versement->fill($request->all());
        $versement->id_periode = $id_periode;
        $versement->id_societe = $id_societe;
        $versement->save();

        return redirect()->route('versements.index', ['id_periode' => $id_periode])->with('success', 'Versement créé avec succès.');
    }
    public function edit($id_periode, $id)
{
    $versement = Versement::findOrFail($id);
    return view('pages.edit_versement', compact('versement', 'id_periode'));
}

public function destroy($id_periode, $id)
{
    $versement = Versement::findOrFail($id);
    $versement->delete();
    return redirect()->route('versements.index', ['id_periode' => $id_periode])->with('success', 'Versement supprimé avec succès.');
}
public function update(Request $request, $id_periode, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'mois' => 'required|string',
            'reference' => 'required|string',
            'date_versement' => 'required|date',
            'mode_paiement' => 'required|string',
            'numero_quittance' => 'required|string',
            'principale' => 'required|numeric',
            'penalite' => 'required|numeric',
            'majorations' => 'required|numeric',
            'total_verse' => 'required|numeric',
        ]);

        // Récupérer le versement à mettre à jour
        $versement = Versement::findOrFail($id);

        // Mettre à jour les champs du versement avec les données du formulaire
        $versement->update($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('versements.index', ['id_periode' => $id_periode])->with('success', 'Versement modifié avec succès.');
    }
}
