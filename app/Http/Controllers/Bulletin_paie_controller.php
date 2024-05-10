<?php

namespace App\Http\Controllers;

use App\Models\PersonnelPermanent;
use Illuminate\Http\Request;
use App\Models\Periode;
use Dompdf\Dompdf;
use App\Models\Entreprise;
use App\Models\Stagiaire;

class Bulletin_paie_controller extends Controller
{
    
  

    public function generatePayroll(Request $request)
    {
        // Récupérer l'employé
        $employee = null;
    
        // Vérifier le type d'employé en fonction du modèle utilisé
        if ($request->id_personnel_permanent){
            // Si c'est un employé permanent
            $employee = PersonnelPermanent::findOrFail($request->id_personnel_permanent);
        } elseif ($request->has('id_stagiaire')) {
            // Si c'est un stagiaire
            $employee = Stagiaire::find($request->id_stagiaire);
        }
       // $employee = PersonnelPermanent::findOrFail($request->id_personnel_permanent);
        
       
        
        // Récupérer les données de l'entreprise (vous devez remplacer cette partie avec la logique appropriée pour récupérer les données de votre entreprise)
        $entreprise = Entreprise::first();
    
        // Créer une instance Dompdf
        $dompdf = new Dompdf();
    
        // Générer le contenu HTML de la vue payroll
        $html = view('pages.payroll', compact('employee', 'entreprise'))->render();
    
        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);
    
        // Rendre le PDF
        $dompdf->render();
    
        // Télécharger le PDF
        return $dompdf->stream('payroll.pdf');
    }
}
