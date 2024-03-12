<?php

namespace App\Http\Controllers;

use App\Models\PersonnelPermanent;
use Illuminate\Http\Request;
use App\Models\Periode; // Assurez-vous d'importer le modèle Periode

class PersonnelPermanentController extends Controller
{
    

    
    public function showPersonnelPermanent($id_periode)
    {
        // Obtenez l'objet Periode correspondant à l'ID de la période
        $periode = Periode::findOrFail($id_periode);
        
        // Maintenant, vous pouvez accéder à l'ID de la société via la relation avec la méthode entreprise()
        $id_societe = $periode->entreprise->id;
        
        // Récupérez la liste des personnels permanents pour cette période
        $personnelPermanents = PersonnelPermanent::where('id_periode', $id_periode)->get();
        
        // Passez les variables à la vue
        return view('pages.personnel-permanent', compact('personnelPermanents', 'id_societe', 'id_periode'));
    }
    

public function create($id_societe, $id_periode)
{
    return view('pages.create-personnel-permanent', compact('id_societe', 'id_periode'));
}

public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'id_societe' => 'required|integer',
            'id_periode' => 'required|integer',
            'matricule' => 'required|string',
            'lf_employe' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            // Ajoutez les règles de validation pour les autres champs si nécessaire
        ]);

        // Créer un nouveau personnel permanent avec les données validées
        $personnelPermanent = PersonnelPermanent::create($request->all());

        // Rediriger avec un message de succès ou autre action nécessaire
        // Rediriger avec un message de succès ou autre action nécessaire
return redirect()->route('periodes.personnel_permanent', ['id_periode' => $request->id_periode])->with('success', 'Personnel permanent créé avec succès.');


    }
  

public function edit($id)
{
    $personnelPermanent = PersonnelPermanent::findOrFail($id);
    // Vous pouvez passer d'autres données nécessaires à la vue ici
    return view('pages.modifier-personnel-permanent', compact('personnelPermanent'));
}

public function update(Request $request, $id)
{
    $personnelPermanent = PersonnelPermanent::findOrFail($id);
    $personnelPermanent->update($request->all());
    $id_periode = $personnelPermanent->id_periode;
    return redirect()->route('periodes.personnel_permanent', ['id_periode' => $id_periode])->with('success', 'Personnel permanent mis à jour avec succès');
}

public function destroy($id)
{
    $personnelPermanent = PersonnelPermanent::findOrFail($id);
    $id_periode = $personnelPermanent->id_periode; // Récupérer l'id de la période associée au personnel permanent

    $personnelPermanent->delete();

    // Rediriger vers la route 'periodes.personnel_permanent' en fournissant l'id_periode
    return redirect()->route('periodes.personnel_permanent', ['id_periode' => $id_periode])->with('success', 'Personnel permanent supprimé avec succès');
}


}