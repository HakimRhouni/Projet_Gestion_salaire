<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use Dompdf\Dompdf;

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
        return "Error" ;
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
    return back()->with('error', 'Une erreur s\'est produite lors de l\'importation des données.');
}


}


