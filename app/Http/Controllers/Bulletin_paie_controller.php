<?php

namespace App\Http\Controllers;

use App\Models\PersonnelPermanent;
use Illuminate\Http\Request;
use App\Models\Periode;
use Dompdf\Dompdf;
use App\Models\Entreprise;

class Bulletin_paie_controller extends Controller
{
    
    public function generatePayroll($id_periode)
{
    // Récupérez tous les personnels permanents de l'entreprise
    $personnels = PersonnelPermanent::where('id_periode', $id_periode)->get();

    // Configuration de Dompdf
   

    // Initialisez Dompdf
    $dompdf = new Dompdf();

    // Itérez sur chaque personnel permanent
    foreach ($personnels as $personnel) {
        // Récupérez les données de l'entreprise associée
        $entreprise = $personnel->entreprise;

        // Remplissez les données dans la vue du bulletin de paie
        $html = view('payroll', compact('personnel', 'entreprise'))->render();

        // Chargez le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Générez le PDF
        $dompdf->render();

        // Enregistrez le PDF sur le serveur ou retournez-le en réponse HTTP
        $output = $dompdf->output();
        file_put_contents(public_path("payroll/{$personnel->matricule}.pdf"), $output);
    }

    return 'Les bulletins de paie ont été générés avec succès.';
}
public function generateePayroll(Request $request)
{
    // Récupérer l'employé
    $employee = null;

    // Vérifier le type d'employé en fonction du modèle utilisé
    if ($request->has('id_personnel_permanent')) {
        // Si c'est un employé permanent
        $employee = PersonnelPermanent::find($request->id_personnel_permanent);
    } elseif ($request->has('id_stagiaire')) {
        // Si c'est un stagiaire
        $employee = Stagiaire::find($request->id_stagiaire);
    }

    // Vérifier si l'employé a été trouvé
    if (!$employee) {
        // Gérer le cas où aucun employé n'est trouvé
        return back()->with('error', 'Employé introuvable.');
    }

    // Passer les données à la vue pour affichage
    return view('payroll', compact('employee'));
}

}
