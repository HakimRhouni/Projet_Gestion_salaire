<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Periode;

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

}
