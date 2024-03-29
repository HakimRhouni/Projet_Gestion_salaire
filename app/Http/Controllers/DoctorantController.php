<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctorant;
use App\Models\Periode;
use Dompdf\Dompdf;
use App\Models\Entreprise;

class DoctorantController extends Controller
{
    public function index($id_periode)
    {
        // Récupérer tous les doctorants depuis la base de données
        $doctorants = Doctorant::where('id_periode', $id_periode)->get();
        $periode = Periode::findOrFail($id_periode);
        $raison_sociale = $periode->entreprise->raison_sociale;
        $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();
    $id_societe = $periode->id_societe;
        
        // Retourner la vue "doctorants" en passant les données des doctorants
        return view('pages.Doctorants', compact('doctorants', 'id_periode', 'id_societe','entreprise'));
    }
    public function store(Request $request,$id_periode, $id_societe)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'numero_cin' => 'required',
            'carte_sejour' => 'required',
            'brut_indemnites' => 'required',
            
        ]);

        // Créer un nouveau doctorant avec les données validées
        $doctorant = new Doctorant();
        $doctorant->fill($validatedData);
        $doctorant->id_periode = $id_periode;
        $doctorant->id_societe = $id_societe;
        $doctorant->save();

        // Rediriger vers la page des doctorants avec un message de succès
        return redirect()->route('doctorants.index',['id_periode' => $id_periode])->with('success', 'Doctorant ajouté avec succès.');
    }
    public function create($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->entreprise;
        $entreprise = $periode->entreprise;
        return view('pages.create_doctorant' ,compact('id_periode', 'id_societe','entreprise'));
        
    }
    public function edit($id_periode, $id_societe, $id)
    {
        $periode = Periode::findOrFail($id_periode);
        $doctorant = Doctorant::findOrFail($id);
        $entreprise = $periode->entreprise;
        return view('pages.edit_doctorant', compact('doctorant', 'id_periode', 'id_societe','entreprise'));
    }

    // Méthode pour mettre à jour les informations d'un doctorant
    public function update(Request $request, $id_periode, $id_societe, $id)
    {
        $doctorant = Doctorant::findOrFail($id);
        $doctorant->update($request->all());
        return redirect()->route('doctorants.index', ['id_periode' => $id_periode])->with('success', 'Doctorant ajouté avec succès.');

    }
    public function destroy($id_periode, $id_societe, $id)
    {
        Doctorant::findOrFail($id)->delete();
        
        return redirect()->route('doctorants.index', ['id_periode' => $id_periode])->with('success', 'Doctorant supprimé avec succès.');
    }
    public function generatePdf($id_periode)
    {
        
        $doctorants = Doctorant::where('id_periode', $id_periode)->get();
        $dompdf = new Dompdf();
        $html = view('pages.doctorants-pdf',compact('doctorants'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('liste-doctorants.pdf');
    }
}
