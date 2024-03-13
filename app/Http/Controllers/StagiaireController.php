<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Periode;


class StagiaireController extends Controller
{
    public function index($id_periode)
{
    // Récupérer tous les stagiaires pour la période spécifiée depuis la base de données
    $stagiaires = Stagiaire::where('id_periode', $id_periode)->get();
    
    // Récupérer l'id de la société pour la période spécifiée
    $periode = Periode::findOrFail($id_periode);
    $id_societe = $periode->id_societe;

    // Retourner la vue "Stagiaire" en passant les données des stagiaires et l'id de la société
    return view('pages.Stagiaire', compact('stagiaires', 'id_periode', 'id_societe'));
}
    
    public function create($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->entreprise; // Assurez-vous que votre modèle Periode a une relation nommée "entreprise"
    
        return view('pages.create_stagiaire', compact('id_periode', 'id_societe'));
    }

    public function store(Request $request, $id_periode, $id_societe)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'cin' => 'required',
            'carte_sejour' => 'required',
            'numero_cnss' => 'required',
            'id_fiscal' => 'required',
            'montant_brut' => 'required',
            'indemnite' => 'required',
            'retenues' => 'required',
            'net_imposable' => 'required',
            'periode' => 'required',
        ]);

        // Créer un nouveau stagiaire avec les données validées
        $stagiaire = new Stagiaire();
        $stagiaire->fill($validatedData);
        $stagiaire->id_periode = $id_periode;
        $stagiaire->id_societe = $id_societe;
        $stagiaire->save();

        // Rediriger vers la page de la liste des stagiaires avec un message de succès
        return redirect()->route('stagiaires.index', ['id_periode' => $id_periode])->with('success', 'Stagiaire ajouté avec succès.');
    }
}
