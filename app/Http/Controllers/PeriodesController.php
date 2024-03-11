<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Periode;
use App\Models\PersonnelPermanent;

class PeriodesController extends Controller
{
    public function index($raison_sociale)
{
    // Récupérer l'entreprise correspondant à la raison sociale
    $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();

    // Récupérer les périodes spécifiques à cette entreprise
    $periodes = $entreprise->periodes;

    // Passer les périodes et l'entreprise à la vue
    return view('pages.dashboard-periode', compact('entreprise', 'periodes'));
}
public function create($raison_sociale)
    {
        // Récupérer l'entreprise correspondant à la raison sociale
        $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();

        // Passer l'entreprise à la vue du formulaire de création de période
        return view('pages.create-periode', compact('entreprise'));
    }
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'annee' => 'required|integer',
            'debut_exercice' => 'required|date',
            'fin_exercice' => 'required|date|after:debut_exercice',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);
        $id_societe = $request->entreprise_id;
        // Création de la période
        Periode::create([
            'annee' => $request->annee,
            'debut_exercice' => $request->debut_exercice,
            'fin_exercice' => $request->fin_exercice,
            'id_societe' => $request->id_societe,
            // Ajoutez d'autres champs du formulaire si nécessaire
        ]);

        // Redirection vers une page de confirmation ou toute autre action après la création de la période
        return redirect()->route('dashboard.periode', [
            'id_societe' => $id_societe,
            'raison_sociale' => $request->raison_sociale
        ]);

        
    }
    public function destroy($id_periode)
    {
        // Trouver la période à supprimer
        $periode = Periode::findOrFail($id_periode);
    
        // Récupérer l'id de la société associée à la période
        $id_societe = $periode->id_societe;
    
        // Supprimer la période
        $periode->delete();
    
        // Redirection vers la page des périodes de l'entreprise associée à cette période
        
        return redirect()->back()->with('success', 'Entreprise supprimée avec succès.');
    }
    public function edit($id_periode)
    {
        // Récupérer la période à modifier
        $periode = Periode::findOrFail($id_periode);

        // Afficher la vue avec le formulaire de modification de la période
        return view('pages.modifier-periode', compact('periode'));
    }

    // Méthode pour traiter la soumission du formulaire de modification d'une période
    public function update(Request $request, $id_periode)
    {
        // Récupérer la période à modifier
        $periode = Periode::findOrFail($id_periode);
    
        // Valider les données du formulaire de modification
        $request->validate([
            'annee' => 'required|integer',
            'debut_exercice' => 'required|date',
            'fin_exercice' => 'required|date',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);
    
        // Mettre à jour les données de la période avec les données du formulaire
        $periode->update($request->all());
    
        // Rediriger vers la page des périodes avec un message de succès
        return redirect()->route('dashboard.periode', [
            'raison_sociale' => $periode->entreprise->raison_sociale
        ])->with('success', 'Période modifiée avec succès.');
    }
    
}