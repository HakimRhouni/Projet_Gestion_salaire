<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
     /**
     * @Route("/ajouter-entreprise", name="ajouter-entreprise")
     */
    
     public function ajouter(Request $request)
     {
         // Validation des données reçues du formulaire d'ajout
         $request->validate([
             'raison_sociale' => 'required|string',
             'commune' => 'required|string',
             'id_fiscal' => 'required|string',
             'forme_juridique' => 'nullable|string',
             'n_taxe_pro' => 'nullable|string',
             'regime' => 'nullable|string',
             'numero_ice' => 'nullable|string',
             'numero_rc' => 'nullable|string',
             'n_cnss' => 'nullable|string',
             'modele' => 'required|string',
             'date_creation' => 'nullable|date',
             'date_premier_acte_exploitation' => 'nullable|date',
             'debut_exercice' => 'nullable|date',
             'compte_dgi' => 'nullable|string',
             'mot_de_passe_compte_dgi' => 'nullable|string',
         ]);
 
         // Création d'une nouvelle entreprise avec les données reçues
         $entrepriseData = [
             'raison_sociale' => $request->raison_sociale,
             'commune' => $request->commune,
             'id_fiscal' => $request->id_fiscal,
             'forme_juridique' => $request->input('forme_juridique', null),
             'n_taxe_pro' => $request->input('n_taxe_pro', null),
             'regime' => $request->input('regime', null),
             'numero_ice' => $request->input('numero_ice', null),
             'numero_rc' => $request->input('numero_rc', null),
             'n_cnss' => $request->input('n_cnss', null),
             'modele' => $request->modele,
             'date_creation' => $request->input('date_creation', null),
             'date_premier_acte_exploitation' => $request->input('date_premier_acte_exploitation', null),
             'debut_exercice' => $request->input('debut_exercice', null),
             'compte_dgi' => $request->input('compte_dgi', null),
             'mot_de_passe_compte_dgi' => $request->input('mot_de_passe_compte_dgi', null),
         ];
 
         Entreprise::create($entrepriseData);
 
         // Redirection vers la page d'origine avec un message de succès
         return redirect()->route('home')->with('success', 'Entreprise ajoutée avec succès.');
     }
    
    public function showModifierForm($id)
    {
        // Récupérer l'entreprise à modifier
        $entreprise = Entreprise::findOrFail($id);

        // Afficher la vue avec le formulaire de modification
        return view('pages.modifier-entreprise', ['entreprise' => $entreprise]);
    }

    // Méthode pour traiter la soumission du formulaire de modification
    public function modifier(Request $request, $id)
    {
        // Récupérer l'entreprise à modifier
        $entreprise = Entreprise::findOrFail($id);

        // Valider les données du formulaire de modification
        $request->validate([
            'raison_sociale' => 'required|string',
            'nom' => 'nullable|string',
            'prenom' => 'nullable|string',
            'n_cin' => 'nullable|string',
            'n_carte_sejour' => 'nullable|string',
            'siege_social' => 'nullable|string',
            'commune' => 'required|string',
            'telephone' => 'nullable|string',
            'fax' => 'nullable|string',
            'email' => 'nullable|string',
            'forme_juridique' => 'required|string',
            'id_fiscal' => 'required|string',
            'n_taxe_pro' => 'nullable|string',
            'regime' => 'nullable|string',
            'numero_ice' => 'nullable|string',
            'numero_rc' => 'nullable|string',
            'n_cnss' => 'nullable|string',
            'modele' => 'required|string',
            'date_creation' => 'nullable|date',
            'date_premier_acte_exploitation' => 'nullable|date',
            'debut_exercice' => 'nullable|date',
            'compte_dgi' => 'nullable|string',
            'mot_de_passe_compte_dgi' => 'nullable|string',
        ]);

        // Mettre à jour les données de l'entreprise avec les données du formulaire
        $entreprise->update($request->all());

        // Rediriger avec un message de succès
        return redirect()->route('home')->with('success', 'Entreprise modifiée avec succès.');
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
