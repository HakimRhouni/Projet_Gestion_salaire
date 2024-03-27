<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\PersonnelOccasionnel;
class PersonnelOccasionnelController extends Controller
{
    public function index($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);
        
        // Maintenant, vous pouvez accéder à l'ID de la société via la relation avec la méthode entreprise()
        $id_societe = $periode->entreprise->id;
        
        // Récupérez la liste des personnels permanents pour cette période
        $personnelOcasionnel = PersonnelOccasionnel::where('id_periode', $id_periode)->get();
        
        // Passez les variables à la vue
        return view('pages.personnel_Ocasionnel', compact('personnelOcasionnel', 'id_societe', 'id_periode'));
    }
    public function create($id_periode)
{
    $periode = Periode::findOrFail($id_periode);
    $entreprise = $periode->entreprise; // Assurez-vous que votre modèle Periode a une relation nommée "entreprise"

    return view('pages.create_personnel_occasionnel', compact('id_periode', 'entreprise'));
}
public function store(Request $request, $id_periode)
{
    // Validez les données du formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'cin' => 'required|string',
        'carte_sejour' => 'required|string',
        'numero_cnss' => 'required|string',
        'id_fiscal' => 'required|string',
        'profession' => 'required|string',
        'montant_brut' => 'required|numeric',
        'ir_preleve' => 'required|numeric',
    ]);

    // Créez un nouveau personnel occasionnel avec les données validées
    $personnel = new PersonnelOccasionnel();
    $personnel->fill($validatedData);
    $personnel->id_periode = $id_periode;
    $personnel->id_societe = $request->id_societe;
    
    // Si nécessaire, attribuez également l'ID de la société
    // $personnel->id_societe = $request->id_societe;
    $personnel->save();

    // Redirigez avec un message de succès
    return redirect()->route('personnel_occasionnel.index', ['id_periode' => $id_periode])->with('success', 'Personnel occasionnel ajouté avec succès.');
}
public function edit($id_periode, $id)
    {
        // Trouver le personnel occasionnel à éditer
        $personnel = PersonnelOccasionnel::findOrFail($id);
        $periode = Periode::findOrFail($id_periode);
    $entreprise = $periode->entreprise;
        // Passer les données à la vue pour l'édition
        return view('pages.edit_personnel_occasionnel', compact('personnel', 'id_periode','entreprise'));
    }

    // Méthode pour mettre à jour un personnel occasionnel
    public function update(Request $request, $id_periode, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'adresse' => 'required|string',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        // Mettre à jour le personnel occasionnel
        $personnel = PersonnelOccasionnel::findOrFail($id);
        $personnel->update($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('personnel_occasionnel.index', ['id_periode' => $id_periode])->with('success', 'Personnel occasionnel mis à jour avec succès.');
    }

    // Méthode pour supprimer un personnel occasionnel
    public function destroy($id_periode, $id)
    {
        // Trouver et supprimer le personnel occasionnel
        $personnel = PersonnelOccasionnel::findOrFail($id);
        $personnel->delete();

        // Rediriger avec un message de succès
        return redirect()->route('personnel_occasionnel.index', ['id_periode' => $id_periode])->with('success', 'Personnel occasionnel supprimé avec succès.');
    }
    public function generatePdf($id_periode)
{
    $personnelOccasionnel = PersonnelOccasionnel::where('id_periode', $id_periode)->get();

    $html = view('pages.personnel-occasionnel-pdf', compact('personnelOccasionnel'))->render();

    $pdf = new Dompdf();
    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    
    return $pdf->stream('liste-personnel-occasionnel.pdf');
}
}
