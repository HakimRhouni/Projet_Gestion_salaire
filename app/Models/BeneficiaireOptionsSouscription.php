<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaireOptionsSouscription extends Model
{
    use HasFactory;

    protected $table = 'beneficiaires_options_souscription';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cin',
        'carte_sejour',
        'id_fiscal',
        'num_cnss',
        'organisme',
        'nbr_actions_acquises',
        'nbr_actions_distribuees',
        'prix_acquisition',
        'date_attribution',
        'valeur_action_attribution',
        'date_levee_option',
        'valeur_action_levee',
        'date_cession',
        'nbr_actions_cedees',
        'montant_abondement',
        'complement_salaire',
        'id_societe',
        'id_periode',
    ];

    // Relations

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_societe', 'id');
    }

    // Relation avec le modèle Periode
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}
