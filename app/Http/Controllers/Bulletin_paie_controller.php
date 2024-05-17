<?php

namespace App\Http\Controllers;

use App\Models\BeneficiaireOptionsSouscription;
use App\Models\PersonnelPermanent;
use Illuminate\Http\Request;
use App\Models\Periode;
use Dompdf\Dompdf;
use App\Models\Entreprise;
use App\Models\PersonnelOccasionnel;
use App\Models\Doctorant;
use App\Models\SalaireBeneficiantExoneration;
use App\Models\Stagiaire;
use Ramsey\Uuid\Type\Integer;

class Bulletin_paie_controller extends Controller
{
    
  

    public function generatePayroll(Request $request)
    {
        // Récupérer l'employé
        $employee = null;
    
        // Vérifier le type d'employé en fonction du modèle utilisé
        if ($request->id_personnel_permanent ){
            // Si c'est un employé permanent
            $employee = PersonnelPermanent::findOrFail($request->id_personnel_permanent);
            $employee->montant_brut = $employee->montant_brut / 12;
            $employee->montant_avantages =  $employee->montant_avantages / 12;
            $employee->montant_indemnites =  $employee->montant_indemnites / 12;
            $employee->montant_exoneres = $employee->montant_exoneres / 12;
            $employee->montant_revenu_brut_imposable =  $employee->montant_revenu_brut_imposable / 12;
            $employee->montant_frais_professionnels =  $employee->montant_frais_professionnels / 12;
            $employee->montant_cotisations =  $employee->montant_cotisations / 12;
            $employee->montant_autres_retenues =  $employee->montant_autres_retenues / 12;
            $employee->montant_echeances =  $employee->montant_echeances / 12;
            $employee->revenu_net_imposable = $employee->revenu_net_imposable / 12;
            $employee -> id = $employee->id_personnel_permanent;
            $employee ->gain = 0;
            $employee ->gain = number_format($employee->montant_brut + $employee->montant_indemnites + $employee->montant_avantages, 2);
            $employee ->Indemnité =0;
            $employee ->Indemnité= number_format($employee->montant_frais_professionnels + $employee->montant_cotisations + $employee->montant_exoneres + $employee->montant_autres_retenues + $employee->montant_echeances , 2);
            
        } 
        elseif ($request->id_stagiaire) {
            // Si c'est un stagiaire
            $employee = Stagiaire::find($request->id_stagiaire);
            $employee -> id = $employee->id_stagiaire;
            $employee->situation_famille = '';
            $employee->cnss = $employee->numero_cnss;
            $employee->montant_brut = $employee->montant_brut / 12;
            $employee->montant_indemnites =  $employee->indemnite / 12;
            $employee->montant_autres_retenues =  $employee->retenues / 12;
            $employee->revenu_net_imposable = $employee->net_imposable / 12;  
        }
      elseif( $request->id_salarie_exoneration){
        $employee = SalaireBeneficiantExoneration::find($request->id_salarie_exoneration);
        $employee -> id = $employee->id_salarie_beneficiant_exoneration;
        $employee->cin = $employee->numero_cin ;
        $employee->cnss = $employee->numero_cnss;
        $employee->situation_famille = '';
        $employee->montant_brut = $employee->brut_traitements / 12;
        $employee->montant_avantages =  $employee->avantages / 12;
        $employee->montant_indemnites =  $employee->indemnite / 12;
        $employee->montant_autres_retenues =  $employee->retenues_operees / 12;
        $employee->revenu_net_imposable = $employee->revenu_net_imposable / 12;
        dd($employee);
        }
        elseif( $request->id_salarie_exoneration){
            $employee = SalaireBeneficiantExoneration::find($request->id_salarie_exoneration);
            $employee -> id = $employee->id_salarie_beneficiant_exoneration;
            $employee->cin = $employee->numero_cin ;
            $employee->cnss = $employee->numero_cnss;
            $employee->situation_famille = '';
            $employee->montant_brut = $employee->brut_traitements / 12;
            $employee->montant_avantages =  $employee->avantages / 12;
            $employee->montant_indemnites =  $employee->indemnite / 12;
            $employee->montant_autres_retenues =  $employee->retenues_operees / 12;
            $employee->revenu_net_imposable = $employee->revenu_net_imposable / 12;
            dd($employee);
            }
            elseif( $request->id_personnel_occasionnel){

                $employee =  PersonnelOccasionnel::find($request->id_personnel_occasionnel);
                $employee -> id = $employee->id_personnel_occasionnel;
                $employee->cin = $employee->cin ;
                $employee->cnss = $employee->numero_cnss;
                $employee->situation_famille = '';
                $employee->montant_brut = $employee->montant_brut / 12;
               
                }

                elseif( $request->id_doctorant) {

                    $employee =  Doctorant::find($request->id_doctorant);
                    $employee -> id = $employee->id_doctorant;
                    $employee->cin = $employee->numero_cin ;
                    $employee->montant_indemnites =  $employee->brut_indemnites / 12;
                    $employee->situation_famille = '';
                }

                elseif( $request->id_beneficiaire_OS) {

                    $employee =  BeneficiaireOptionsSouscription::find($request->id_beneficiaire_OS);
                    $employee -> id = $employee->id_beneficiaire_options_souscription;
                    $employee->cnss = $employee->num_cnss;
                    $employee->situation_famille = '';
                }
        $entreprise = Entreprise::first();
    
        // Créer une instance Dompdf
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');
    
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
