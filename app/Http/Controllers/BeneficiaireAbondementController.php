<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiaireAbondement; 
use App\Models\Periode;

class BeneficiaireAbondementController extends Controller
{
    public function index($id_periode)
    {
        // Récupérez la liste des bénéficiaires d'abondement depuis le modèle
        $beneficiairesAbondement = BeneficiaireAbondement::all();
        $periode = Periode::findOrFail($id_periode);
    $id_societe = $periode->id_societe;

        // Retournez la vue avec les données des bénéficiaires d'abondement
        return view('pages.beneficiaires_abondement',  compact('beneficiairesAbondement', 'id_periode', 'id_societe'));
    }

    public function create($id_periode, $id_societe)
    {
        return view('pages.create_beneficiaires_abondement', compact('id_periode', 'id_societe'));
    }

    public function store(Request $request, $id_periode,$id_societe)
    {
        // Validez les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'cin' => 'required|string',
            'carte_sejour' => 'nullable|string',
            'commune' => 'nullable|string',
            'numero_plan' => 'required|string',
            'duree_annees' => 'required|integer',
            'date_ouverture' => 'required|date',
            'montant_abondement' => 'required|numeric',
            'montant_annuel_revenu_imposable' => 'required|numeric',
        ]);

        // Créez un nouveau bénéficiaire d'abondement
        $beneficiaire = new BeneficiaireAbondement();

        // Remplissez les champs avec les données du formulaire
        $beneficiaire->fill($request->all());
        $beneficiaire->id_periode = $id_periode;
        $beneficiaire->id_societe = $id_societe;

        // Sauvegardez le bénéficiaire
        $beneficiaire->save();

        // Redirigez avec un message de succès
        return redirect()->route('beneficiairesAbondement.index', ['id_periode' => $id_periode])->with('success', 'Bénéficiaire d\'abondement créé avec succès.');
    }
}
