<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Validator;

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
    public function generatePdf()
{
    $entreprises = Entreprise::all(); 
    $pdf = new Dompdf();
    $pdf->loadHtml(view('pages.entreprises-pdf', compact('entreprises')));
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('liste_entreprises.pdf');
}
public function import(Request $request)
{
    // Valider la requête
    $validator = Validator::make($request->all(), [
        'csv_file' => 'required|mimes:csv,txt',
    ]);

    // Vérifier s'il y a des erreurs de validation
    if ($validator->fails()) {
        abort(404, 'Erreur 404: Fichier non trouvé');
    }

    // Vérifier si un fichier a été téléchargé
    if ($request->hasFile('csv_file')) {
        $file = $request->file('csv_file');

        // Lire le fichier CSV
        $data = array_map('str_getcsv', file($file), [',']);

        // Supprimer la première ligne (en-tête des colonnes)
        array_shift($data);

        // Traiter les données et enregistrer dans la base de données
        foreach ($data as $row) {
            // Vérifier si une entreprise avec la même raison sociale existe déjà
            $existingEntreprise = Entreprise::where('raison_sociale', $row[0])->first();

            if (!$existingEntreprise) {
                // Créer une nouvelle instance de l'entreprise
                $entreprise = new Entreprise();
                $entreprise->raison_sociale = !empty($row[0]) ? $row[0] : null;
                $entreprise->nom = !empty($row[1]) ? $row[1] : null;
                $entreprise->prenom = !empty($row[2]) ? $row[2] : null;
                $entreprise->n_cin = !empty($row[3]) ? $row[3] : null;
                $entreprise->n_carte_sejour = !empty($row[4]) ? $row[4] : null;
                $entreprise->siege_social = !empty($row[5]) ? $row[5] : null;
                $entreprise->commune = !empty($row[6]) ? $row[6] : null;
                $entreprise->telephone = !empty($row[7]) ? $row[7] : null;
                $entreprise->fax = !empty($row[8]) ? $row[8] : null;
                $entreprise->email = !empty($row[9]) ? $row[9] : null;
                $entreprise->forme_juridique = !empty($row[10]) ? $row[10] : null;
                $entreprise->id_fiscal = !empty($row[11]) ? $row[11] : null;
                $entreprise->n_taxe_pro = !empty($row[12]) ? $row[12] : null;
                $entreprise->regime = !empty($row[13]) ? $row[13] : null;
                $entreprise->numero_ice = !empty($row[14]) ? $row[14] : null;
                $entreprise->numero_rc = !empty($row[15]) ? $row[15] : null;
                $entreprise->n_cnss = !empty($row[16]) ? $row[16] : null;
                $entreprise->modele = !empty($row[17]) ? $row[17] : null;
                $entreprise->date_creation = !empty($row[18]) ? $row[18] : null;
                $entreprise->date_premier_acte_exploitation = !empty($row[19]) ? $row[19] : null;
                $entreprise->debut_exercice = !empty($row[20]) ? $row[20] : null;
                $entreprise->compte_dgi = !empty($row[21]) ? $row[21] : null;
                $entreprise->mot_de_passe_compte_dgi = !empty($row[22]) ? $row[22] : null;

                // Enregistrer l'entreprise dans la base de données
                $entreprise->save();
            }
        }

        // Rediriger avec un message de succès
        return back()->with('success', 'Les données ont été importées avec succès.');
    }

    // Rediriger en cas d'échec
    return back()->with('erreur 404 verifier votre fichier', 'Une erreur s\'est produite lors de l\'importation des données.');
}

public function creerXML($id)
{
    // Créer un nouvel objet SimpleXMLElement
    $xml = new \SimpleXMLElement('<entreprises/>');

    // Boucler à travers les données d'entreprise pour ajouter chaque entreprise au XML
    $entreprise = Entreprise::find($id);
        $entreprise_xml = $xml->addChild('entreprise');
        $entreprise_xml->addChild('raison_sociale', $entreprise->raison_sociale);
        $entreprise_xml->addChild('commune', $entreprise->commune);
        $entreprise_xml->addChild('forme_juridique', $entreprise->forme_juridique);
        $entreprise_xml->addChild('id_fiscal', $entreprise->id_fiscal);
        $entreprise_xml->addChild('regime', $entreprise->regime);
        $entreprise_xml->addChild('modele', $entreprise->modele);

        

        // Récupérer toutes les périodes liées à cette entreprise
        $periodes = $entreprise->periodes;

        // Boucler à travers les périodes
        foreach ($periodes as $periode) {
            $periode_xml = $entreprise_xml->addChild('periode');
            $periode_xml->addChild('annee', $periode->annee);
            $periode_xml->addChild('debut_exercice', $periode->debut_exercice);
            $periode_xml->addChild('fin_exercice', $periode->fin_exercice);
           
            // Ajouter d'autres données de période selon votre modèle Periode

            // Récupérer tous les employés permanents liés à cette période
            $personnel_permanent = $periode->PersonnelPermanent;
            $Salaire_Beneficiant_Exoneration= $periode->SalaireBeneficiantExoneration;
            $Personnel_Occasionnel = $periode->PersonnelOccasionnel;
            $Stagiaire = $periode->Stagiaire;
            $Doctorant = $periode->Doctorant;
            $Beneficiaire_Options_Souscription = $periode->BeneficiaireOptionsSouscription;
            $BeneficiaireAbondement = $periode->BeneficiaireAbondement;
            $Versement = $periode->Versement;
            
           
            if ($personnel_permanent){
            foreach ($personnel_permanent as $employe) {
                $employe_xml = $periode_xml->addChild('personnel_permanent');
                $employe_xml->addChild('nom', $employe->nom);
                $employe_xml->addChild('prenom', $employe->prenom);
                $employe_xml->addChild('cin', $employe->cin);
                $employe_xml->addChild('carte_sejour', $employe->carte_sejour);
                $employe_xml->addChild('cnss', $employe->cnss);
                $employe_xml->addChild('situation_famille', $employe->situation_famille);
                $employe_xml->addChild('salaire_base_annuel', $employe->salaire_base_annuel);
                $employe_xml->addChild('montant_brut', $employe->montant_brut);
                $employe_xml->addChild('montant_avantages', $employe->montant_avantages);
                $employe_xml->addChild('montant_indemnites', $employe->montant_indemnites);
                $employe_xml->addChild('montant_exoneres', $employe->montant_exoneres);
                $employe_xml->addChild('montant_revenu_brut_imposable', $employe->montant_revenu_brut_imposable);
                $employe_xml->addChild('montant_frais_professionnels', $employe->montant_frais_professionnels);
                $employe_xml->addChild('montant_cotisations', $employe->montant_cotisations);
                $employe_xml->addChild('montant_autres_retenues', $employe->montant_autres_retenues);
                $employe_xml->addChild('montant_echeances', $employe->montant_echeances);
                $employe_xml->addChild('revenu_net_imposable', $employe->revenu_net_imposable);
                $employe_xml->addChild('nb_reductions_charge_famille', $employe->nb_reductions_charge_famille);
                $employe_xml->addChild('periode_jours', $employe->periode_jours);
                $employe_xml->addChild('date_permis_habiter', $employe->date_permis_habiter);
                $employe_xml->addChild('ir_preleve', $employe->ir_preleve);
                $employe_xml->addChild('date_autorisation_construir', $employe->date_autorisation_construir);


                
            }}
            if ($Salaire_Beneficiant_Exoneration) {
            foreach ($Salaire_Beneficiant_Exoneration as $SalaireBE) {
                $employe_xml = $periode_xml->addChild('Salaire_Beneficiant_Exoneration');
                $employe_xml->addChild('nom', $SalaireBE->nom);
                $employe_xml->addChild('prenom', $SalaireBE->prenom);
                $employe_xml->addChild('numero_cin', $SalaireBE->numero_cin);
                $employe_xml->addChild('carte_sejour', $SalaireBE->carte_sejour);
                $employe_xml->addChild('numero_cnss', $SalaireBE->numero_cnss);
                $employe_xml->addChild('id_fiscale', $SalaireBE->id_fiscale);
                $employe_xml->addChild('date_recrutement', $SalaireBE->date_recrutement);
                $employe_xml->addChild('periode_en_jours', $SalaireBE->periode_en_jours);
                $employe_xml->addChild('brut_traitements', $SalaireBE->brut_traitements);
                $employe_xml->addChild('avantages', $SalaireBE->avantages);
                $employe_xml->addChild('indemnite', $SalaireBE->indemnite);
                $employe_xml->addChild('revenu_brut_imposable', $SalaireBE->revenu_brut_imposable);
                $employe_xml->addChild('retenues_operees', $SalaireBE->retenues_operees);
                $employe_xml->addChild('revenu_net_imposable', $SalaireBE->revenu_net_imposable);
            
            }}
            if ($Personnel_Occasionnel) {
            foreach ($Personnel_Occasionnel as $personnel_occasionnel) {
                $employe_xml = $periode_xml->addChild('personnel_occasionnel');
                $employe_xml->addChild('nom', $personnel_occasionnel->nom);
                $employe_xml->addChild('prenom', $personnel_occasionnel->prenom);
                $employe_xml->addChild('cin', $personnel_occasionnel->cin);
                $employe_xml->addChild('carte_sejour', $personnel_occasionnel->carte_sejour);
                $employe_xml->addChild('numero_cnss', $personnel_occasionnel->numero_cnss);
                $employe_xml->addChild('id_fiscal', $personnel_occasionnel->id_fiscal);
                $employe_xml->addChild('profession', $personnel_occasionnel->profession);
                $employe_xml->addChild('montant_brut', $personnel_occasionnel->montant_brut);
                $employe_xml->addChild('ir_preleve', $personnel_occasionnel->nom);
               


                
            }
        }
        if ($Stagiaire) {
            foreach ($Stagiaire as $stagiaires) {
                $employe_xml = $periode_xml->addChild('stagiaires');
                $employe_xml->addChild('nom', $stagiaires->nom);
                $employe_xml->addChild('prenom', $stagiaires->prenom);
                $employe_xml->addChild('adresse', $stagiaires->adresse);
                $employe_xml->addChild('cin', $stagiaires->cin);
                $employe_xml->addChild('carte_sejour', $stagiaires->carte_sejour);
                $employe_xml->addChild('numero_cnss', $stagiaires->numero_cnss);
                $employe_xml->addChild('id_fiscal', $stagiaires->id_fiscal);
                $employe_xml->addChild('montant_brut', $stagiaires->montant_brut);
                $employe_xml->addChild('indemnite', $stagiaires->indemnite);
                $employe_xml->addChild('retenues', $stagiaires->retenues);
                $employe_xml->addChild('net_imposable', $stagiaires->net_imposable);
              
            }}
            if ($Doctorant) {
            foreach ($Doctorant as $doctorants) {
                $employe_xml = $periode_xml->addChild('doctorants');
                $employe_xml->addChild('nom', $doctorants->nom);
                $employe_xml->addChild('prenom', $doctorants->prenom);
                $employe_xml->addChild('numero_cin', $doctorants->numero_cin);
                $employe_xml->addChild('carte_sejour', $doctorants->carte_sejour);
                $employe_xml->addChild('brut_indemnites', $doctorants->brut_indemnites);
                
            }}
            if ($Beneficiaire_Options_Souscription) {
            foreach ($Beneficiaire_Options_Souscription as $beneficiairesOS) {
                $employe_xml = $periode_xml->addChild('beneficiaires_options_souscription');
                $employe_xml->addChild('nom', $beneficiairesOS->nom);
                $employe_xml->addChild('prenom', $beneficiairesOS->prenom);
                $employe_xml->addChild('cin', $beneficiairesOS->cin);
                $employe_xml->addChild('carte_sejour', $beneficiairesOS->carte_sejour);
                $employe_xml->addChild('num_cnss', $beneficiairesOS->num_cnss);
                $employe_xml->addChild('id_fiscal', $beneficiairesOS->id_fiscal);
                $employe_xml->addChild('organisme', $beneficiairesOS->organisme);
                $employe_xml->addChild('nbr_actions_acquises', $beneficiairesOS->nbr_actions_acquises);
                $employe_xml->addChild('nbr_actions_distribuees', $beneficiairesOS->nbr_actions_distribuees);
                $employe_xml->addChild('prix_acquisition', $beneficiairesOS->prix_acquisition);
                $employe_xml->addChild('date_attribution', $beneficiairesOS->date_attribution);
                $employe_xml->addChild('valeur_action_attribution', $beneficiairesOS->valeur_action_attribution);
                $employe_xml->addChild('date_levee_option', $beneficiairesOS->date_levee_option);
                $employe_xml->addChild('valeur_action_levee', $beneficiairesOS->valeur_action_levee);
                $employe_xml->addChild('date_cession', $beneficiairesOS->date_cession);
                $employe_xml->addChild('nbr_actions_cedees', $beneficiairesOS->nbr_actions_cedees);
                $employe_xml->addChild('montant_abondement', $beneficiairesOS->montant_abondement);
                $employe_xml->addChild('complement_salaire', $beneficiairesOS->nom);
               


            }
            }
            if ($BeneficiaireAbondement) {
            foreach ($BeneficiaireAbondement as $beneficiaires_abondement) {
                $employe_xml = $periode_xml->addChild('beneficiaires_abondement');
                $employe_xml->addChild('nom', $beneficiaires_abondement->nom);
                $employe_xml->addChild('prenom', $beneficiaires_abondement->prenom);
                $employe_xml->addChild('cin', $beneficiaires_abondement->cin);
                $employe_xml->addChild('carte_sejour', $beneficiaires_abondement->carte_sejour);
                $employe_xml->addChild('commune', $beneficiaires_abondement->commune);
                $employe_xml->addChild('numero_plan', $beneficiaires_abondement->numero_plan);
                $employe_xml->addChild('duree_annees', $beneficiaires_abondement->duree_annees);
                $employe_xml->addChild('date_ouverture', $beneficiaires_abondement->date_ouverture);
                $employe_xml->addChild('montant_abondement', $beneficiaires_abondement->montant_abondement);
                $employe_xml->addChild('montant_annuel_revenu_imposable', $beneficiaires_abondement->montant_annuel_revenu_imposable);
                

               
            }

                
            }
            if ($Versement) {
            foreach ($Versement as $versements) {
                $employe_xml = $periode_xml->addChild('versements');
                $employe_xml->addChild('mois', $versements->mois);
                $employe_xml->addChild('reference', $versements->reference);
                $employe_xml->addChild('date_versement', $versements->date_versement);
                $employe_xml->addChild('mode_paiement', $versements->mode_paiement);
                $employe_xml->addChild('numero_quittance', $versements->numero_quittance);
                $employe_xml->addChild('principale', $versements->principale);
                $employe_xml->addChild('penalite', $versements->penalite);
                $employe_xml->addChild('majorations', $versements->majorations);
                $employe_xml->addChild('total_verse', $versements->total_verse);
               


            }
            }
           
        }
    

    // Formater le XML
    $dom = dom_import_simplexml($xml)->ownerDocument;
    $dom->formatOutput = true;
    
    // Générer la chaîne XML
    $xmlString = $dom->saveXML();

    // Écrivez la chaîne XML dans un fichier
    $fileName = $entreprise->raison_sociale . '_' . date('Y-m-d_H-i-s') . '.xml';


    // Enregistrer le fichier dans le stockage temporaire
    return Response::make($xmlString, 200, [
        'Content-Type' => 'application/xml',
        'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    ]);
}

}


