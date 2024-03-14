<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeneficiaireOptionsSouscription;
use App\Models\Periode;

class BeneficiaireOSController extends Controller
{
    public function index($id_periode  )
    {
        $beneficiairesOS = BeneficiaireOptionsSouscription::all();
        $periode = Periode::findOrFail($id_periode);
    $id_societe = $periode->id_societe;
    
        return view('pages.beneficiairesOS', compact('beneficiairesOS', 'id_societe','id_periode'));
    }
    public function create($id_periode)
    {
        // Récupérer la période correspondante
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->id_societe;
        // Passer l'ID de la période à la vue pour l'utiliser dans le formulaire
        return view('pages.create_beneficiaire_os', compact('id_periode','id_societe'));
    }
    public function store(Request $request, $id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->id_societe;
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            'cin' => 'required|string',
            'carte_sejour' => 'required|string',
            'id_fiscal' => 'required|string',
            'num_cnss' => 'required|string',
            'organisme' => 'required|string',
            'nbr_actions_acquises' => 'required|integer',
            'nbr_actions_distribuees' => 'required|integer',
            'prix_acquisition' => 'required|numeric',
            'date_attribution' => 'required|date',
            'valeur_action_attribution' => 'required|numeric',
            'date_levee_option' => 'nullable|date',
            'valeur_action_levee' => 'nullable|numeric',
            'date_cession' => 'nullable|date',
            'nbr_actions_cedees' => 'nullable|integer',
            'montant_abondement' => 'nullable|numeric',
            'complement_salaire' => 'nullable|numeric',
        ]);

        // Créer un nouveau bénéficiaire d'options de souscription
        $beneficiaire = new BeneficiaireOptionsSouscription();

        // Remplir les champs avec les données du formulaire
        $beneficiaire->nom = $request->input('nom');
        $beneficiaire->prenom = $request->input('prenom');
        $beneficiaire->adresse = $request->input('adresse');
        $beneficiaire->cin = $request->input('cin');
        $beneficiaire->carte_sejour = $request->input('carte_sejour');
        $beneficiaire->id_fiscal = $request->input('id_fiscal');
        $beneficiaire->num_cnss = $request->input('num_cnss');
        $beneficiaire->organisme = $request->input('organisme');
        $beneficiaire->nbr_actions_acquises = $request->input('nbr_actions_acquises');
        $beneficiaire->nbr_actions_distribuees = $request->input('nbr_actions_distribuees');
        $beneficiaire->prix_acquisition = $request->input('prix_acquisition');
        $beneficiaire->date_attribution = $request->input('date_attribution');
        $beneficiaire->valeur_action_attribution = $request->input('valeur_action_attribution');
        $beneficiaire->date_levee_option = $request->input('date_levee_option');
        $beneficiaire->valeur_action_levee = $request->input('valeur_action_levee');
        $beneficiaire->date_cession = $request->input('date_cession');
        $beneficiaire->nbr_actions_cedees = $request->input('nbr_actions_cedees');
        $beneficiaire->montant_abondement = $request->input('montant_abondement');
        $beneficiaire->complement_salaire = $request->input('complement_salaire');
        $beneficiaire->id_periode = $id_periode;
        $beneficiaire->id_societe = $id_societe;

        // Sauvegarder le bénéficiaire
        $beneficiaire->save();

        // Redirection avec un message de succès
        return redirect()->route('beneficiairesOS.index', ['id_periode' => $id_periode, 'id_societe' => $id_societe])->with('success', 'Bénéficiaire ajouté avec succès.');
}
public function update(Request $request, $id_periode, $id_societe)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'cin' => 'required|string',
        'carte_sejour' => 'required|string',
        'id_fiscal' => 'required|string',
        'num_cnss' => 'required|string',
        'organisme' => 'required|string',
        'nbr_actions_acquises' => 'required|integer',
        'nbr_actions_distribuees' => 'required|integer',
        'prix_acquisition' => 'required|numeric',
        'date_attribution' => 'required|date',
        'valeur_action_attribution' => 'required|numeric',
        'date_levee_option' => 'nullable|date',
        'valeur_action_levee' => 'nullable|numeric',
        'date_cession' => 'nullable|date',
        'nbr_actions_cedees' => 'nullable|integer',
        'montant_abondement' => 'nullable|numeric',
        'complement_salaire' => 'nullable|numeric',
    ]);

    // Mettez à jour le bénéficiaire
    $beneficiaire = BeneficiaireOptionsSouscription::findOrFail($id_societe);
    $beneficiaire->update($request->all());

    return redirect()->route('beneficiairesOS.index', compact('id_periode'))->with('success', 'Bénéficiaire modifié avec succès.');
}
public function edit($id_periode, $id_societe)
{
    $beneficiaire = BeneficiaireOptionsSouscription::findOrFail($id_societe);
    return view('pages.edit_beneficiaire_os', compact('beneficiaire', 'id_periode'));
}
public function destroy($id_periode, $id_societe)
{
    $beneficiaire = BeneficiaireOptionsSouscription::findOrFail($id_societe);
    $beneficiaire->delete();
    return redirect()->route('beneficiairesOS.index', compact('id_periode'))->with('success', 'Bénéficiaire supprimé avec succès.');
}
}