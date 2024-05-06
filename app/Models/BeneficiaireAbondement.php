<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaireAbondement extends Model
{
    use HasFactory;

    protected $table = 'beneficiaires_abondement';
    protected $primaryKey = 'id_beneficiaire_abondement';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cin',
        'carte_sejour',
        'commune',
        'numero_plan',
        'duree_annees',
        'date_ouverture',
        'montant_abondement',
        'montant_annuel_revenu_imposable',
        'id_societe',
        'id_periode',
    ];

    // Relation avec l'entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_societe', 'id_entreprise');
    }

    // Relation avec la période
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
