<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaireBeneficiantExoneration extends Model
{
    use HasFactory;

    protected $table = 'salaries_beneficiant_exoneration';

    protected $fillable = [
        'id_periode',
        'id_societe',
        'nom',
        'prenom',
        'adresse',
        'numero_cin',
        'carte_sejour',
        'numero_cnss',
        'id_fiscale',
        'date_recrutement',
        'periode_en_jours',
        'brut_traitements',
        'avantages',
        'indemnite',
        'revenu_brut_imposable',
        'retenues_operees',
        'revenu_net_imposable',
    ];

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
