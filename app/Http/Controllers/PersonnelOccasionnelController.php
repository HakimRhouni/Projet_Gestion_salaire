<?php

namespace App\Http\Controllers;

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
}
