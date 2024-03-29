<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\SalaireBeneficiantExoneration;
use Dompdf\Dompdf;
use App\Models\Entreprise;

class SalariesExonerationController extends Controller
{
    public function index($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $raison_sociale = $periode->entreprise->raison_sociale;
        $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();
        $id_societe = $periode->entreprise->id;
        
        // Récupérez la liste des personnels permanents pour cette période
        $salaries_exoneres = SalaireBeneficiantExoneration::where('id_periode', $id_periode)->get();
        
        // Passez les variables à la vue
        return view('pages.salaries_exoneration', compact('salaries_exoneres', 'id_societe', 'id_periode','entreprise'));
    }
    public function create($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        $id_societe = $periode->entreprise->id;
        $raison_sociale = $periode->entreprise->raison_sociale;
        $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();

        return view('pages.create_salaries_exoneration',compact('id_periode','id_societe','entreprise'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'numero_cin' => 'required|string',
            'carte_sejour' => 'nullable|string',
            'id_societe' => 'required|numeric', 
            'id_periode' => 'required|numeric', 
            'adresse' => 'required|string',
            'numero_cnss' => 'required|string',
            'id_fiscale' => 'required|string',
            'date_recrutement' => 'required|date',
            'periode_en_jours' => 'required|numeric',
            'brut_traitements' => 'required|numeric',
            'avantages' => 'required|numeric',
            'indemnite' => 'required|numeric',
            'revenu_brut_imposable' => 'required|numeric',
            'retenues_operees' => 'required|numeric',
            'revenu_net_imposable' => 'required|numeric',
        ]);

        // Créer un nouveau salarié exonéré avec les données validées
        SalaireBeneficiantExoneration::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('salaries_exoneration.index', ['id_periode' => $request->id_periode])->with('success', 'Le salarié exonéré a été créé avec succès.');

    }
    public function destroy($id)
    {
        // Trouver le salarié exonéré à supprimer
        $salarie = SalaireBeneficiantExoneration::findOrFail($id);
        $id_periode = $salarie->id_periode;

        // Supprimer le salarié exonéré
        $salarie->delete();

        // Redirection avec un message de succès
        return redirect()->route('salaries_exoneration.index',['id_periode' => $id_periode])->with('success', 'Le salarié exonéré a été supprimé avec succès.');
    }
    public function edit($id)
{
    // Trouver le salarié exonéré à éditer
    $salarie = SalaireBeneficiantExoneration::findOrFail($id);
    $id_periode = $salarie->id_periode;
    $periode = Periode::findOrFail($id_periode);
    $raison_sociale = $periode->entreprise->raison_sociale;
    $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();

    // Passer les données à la vue pour l'édition
    return view('pages.edit_salaries_exoneration', compact('salarie', 'id_periode','entreprise'));
}
public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'numero_cin' => 'required|string',
        'carte_sejour' => 'nullable|string',
        'numero_cnss' => 'required|string',
        'id_fiscale' => 'required|string',
        'date_recrutement' => 'required|date',
        'periode_en_jours' => 'required|numeric',
        'brut_traitements' => 'required|numeric',
        'avantages' => 'required|numeric',
        'indemnite' => 'required|numeric',
        'revenu_brut_imposable' => 'required|numeric',
        'retenues_operees' => 'required|numeric',
        'revenu_net_imposable' => 'required|numeric',
    ]);

    // Mettre à jour les données du salarié exonéré
    $Salarieexonéré=SalaireBeneficiantExoneration::findOrFail($id);
    $Salarieexonéré->update($validatedData);
    $id_periode = $Salarieexonéré->id_periode;


    // Rediriger avec un message de succès
    return redirect()->route('salaries_exoneration.index', ['id_periode' => $id_periode])->with('success', 'Le salarié exonéré a été modifié avec succès.');
}
public function generatePdf($id_periode)
{
    // Obtenez la liste des salariés exonérés pour cette période
    $salaries_exoneres = SalaireBeneficiantExoneration::where('id_periode', $id_periode)->get();

    // Générez le contenu HTML en utilisant la vue que vous avez créée
    $html = view('pages.salaries-exoneres-pdf', compact('salaries_exoneres'))->render();

    // Créez une nouvelle instance de Dompdf
    $pdf = new Dompdf();

    // Chargez le contenu HTML dans Dompdf
    $pdf->loadHtml($html);

    // Définissez le format du papier et l'orientation
    $pdf->setPaper('A4', 'portrait');

    // Rendez le PDF
    $pdf->render();

    // Affichez le PDF dans le navigateur
    return $pdf->stream('liste-salaries-exoneres.pdf');
}

}
