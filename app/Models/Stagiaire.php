<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stagiaire';
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cin',
        'carte_sejour',
        'numero_cnss',
        'id_fiscal',
        'montant_brut',
        'indemnite',
        'retenues',
        'net_imposable',
        'periode',
        'id_periode',
        'id_societe',
    ];

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
