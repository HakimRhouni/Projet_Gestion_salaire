<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function ajouter(Request $request)
    {
        // Récupérer les données du formulaire
        $donnees = $request->all();

        // Créer une nouvelle entreprise avec les données du formulaire
        Entreprise::create($donnees);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Entreprise ajoutée avec succès.');
    }

    
    public function modifier(Request $request, $id)
{
    // Récupérer l'entreprise à modifier
    $entreprise = Entreprise::findOrFail($id);

    // Valider les données du formulaire
    $request->validate([
        'raison_sociale' => 'required|string',
        'id_fiscal' => 'required|string',
        'forme_juridique' => 'required|string',
        'regime' => 'required|string',
        'modele' => 'required|string',
        'telephone' => 'required|string',
    ]);

    // Mettre à jour les données de l'entreprise avec les données du formulaire
    $entreprise->update($request->all());

    // Rediriger avec un message de succès
    return redirect()->back()->with('success', 'Entreprise modifiée avec succès.');
}

    public function supprimer($id)
    {
        // Trouver l'entreprise à supprimer
        $entreprise = Entreprise::findOrFail($id);

        // Supprimer l'entreprise
        $entreprise->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Entreprise supprimée avec succès.');
    }

    public function rechercher(Request $request)
    {
        // Récupérer le terme de recherche depuis la requête
        $recherche = $request->input('recherche');

        // Effectuer la recherche dans la base de données
        $resultats = Entreprise::where('raison_sociale', 'LIKE', "%{$recherche}%")
                                ->orWhere('id_fiscal', 'LIKE', "%{$recherche}%")
                                ->orWhere('forme_juridique', 'LIKE', "%{$recherche}%")
                                ->orWhere('regime', 'LIKE', "%{$recherche}%")
                                ->orWhere('modele', 'LIKE', "%{$recherche}%")
                                ->orWhere('telephone', 'LIKE', "%{$recherche}%")
                                ->get();

        // Retourner les résultats de la recherche à la vue
        return view('votre_vue', ['resultats' => $resultats]);
    }
}