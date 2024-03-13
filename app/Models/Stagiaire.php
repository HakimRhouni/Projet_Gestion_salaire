<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

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
        'periode_id', // Clé étrangère pour la période
        'entreprise_id', // Clé étrangère pour l'entreprise
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
