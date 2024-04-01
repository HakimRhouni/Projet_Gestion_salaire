<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stagiaire;
use App\Models\Periode;
use Dompdf\Dompdf;
use App\Models\Entreprise;



class StagiaireController extends Controller
{
    public function index($id_periode)
{
    // Récupérer tous les stagiaires pour la période spécifiée depuis la base de données
    $stagiaires = Stagiaire::where('id_periode', $id_periode)->get();
    
    // Récupérer l'id de la société pour la période spécifiée
    $periode = Periode::findOrFail($id_periode);
    $raison_sociale = $periode->entreprise->raison_sociale;
    $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();
    $id_societe = $periode->id_societe;

    // Retourner la vue "Stagiaire" en passant les données des stagiaires et l'id de la société
    return view('pages.Stagiaire', compact('stagiaires', 'id_periode', 'id_societe','entreprise'));
}
    
    public function create($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->entreprise; 
        $entreprise = $periode->entreprise;
    
        return view('pages.create_stagiaire', compact('id_periode', 'id_societe', 'entreprise'));
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
            'montant_brut' => 'required | numeric',
            'indemnite' => 'required | numeric',
            'retenues' => 'required | numeric',
            'net_imposable' => 'required | numeric',
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
    public function edit($id_periode, $id)
{
    $stagiaire = Stagiaire::findOrFail($id);
    $periode = Periode::findOrFail($id_periode);
    $id_societe = $periode->entreprise; 
    $entreprise = $periode->entreprise;

    return view('pages.edit_stagiaire', compact('stagiaire', 'id_periode', 'id_societe','entreprise'));
}
public function update(Request $request, $id_periode, $id)
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

   
    $stagiaire = Stagiaire::findOrFail($id);
    
    $stagiaire->update($validatedData);

    // Rediriger avec un message de succès
    return redirect()->route('stagiaires.index', ['id_periode' => $id_periode])->with('success', 'Stagiaire mis à jour avec succès.');
}

public function destroy($id_periode, $id)
{
    // Trouver le stagiaire et le supprimer
    $stagiaire = Stagiaire::findOrFail($id);
    $stagiaire->delete();

    // Rediriger avec un message de succès
    return redirect()->route('stagiaires.index', ['id_periode' => $id_periode])->with('success', 'Stagiaire supprimé avec succès.');
}
public function generatePdf($id_periode)
{
    // Récupérez les stagiaires pour la période spécifiée
    $stagiaires = Stagiaire::where('id_periode', $id_periode)->get();

    // Générez le contenu HTML en utilisant la vue que vous avez créée
    $html = view('pages.stagiaires-pdf', compact('stagiaires'))->render();

    // Créez une nouvelle instance de Dompdf
    $pdf = new Dompdf();

    // Chargez le contenu HTML dans Dompdf
    $pdf->loadHtml($html);

    // Définissez le format du papier et l'orientation
    $pdf->setPaper('A4', 'portrait');

    // Rendez le PDF
    $pdf->render();

    // Affichez le PDF dans le navigateur
    return $pdf->stream('liste-stagiaires.pdf');
}
}
