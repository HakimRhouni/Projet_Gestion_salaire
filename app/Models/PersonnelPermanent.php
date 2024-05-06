<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelPermanent extends Model
{
    use HasFactory;

    protected $table = 'personnel_permanents';
    protected $primaryKey = 'id_personnel_permanent';

    protected $fillable = [
        'id_societe',
        'id_periode',
        'matricule',
        'lf_employe',
        'nom',
        'prenom',
        'cin',
        'carte_sejour',
        'cnss',
        'situation_famille',
        'adresse',
        'salaire_base_annuel',
        'montant_brut',
        'montant_avantages',
        'montant_indemnites',
        'montant_exoneres',
        'montant_revenu_brut_imposable',
        'montant_frais_professionnels',
        'montant_cotisations',
        'montant_autres_retenues',
        'montant_echeances',
        'revenu_net_imposable',
        'nb_reductions_charge_famille',
        'periode_jours',
        'date_permis_habiter',
        'ir_preleve',
        'date_autorisation_construire',
    ];

    // Relation avec le modèle Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_societe', 'id_entreprise');
    }

    // Relation avec le modèle Periode
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id_periode');
    }
}
