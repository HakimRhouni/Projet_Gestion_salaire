<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_versement';

    protected $fillable = [
        'mois',
        'reference',
        'date_versement',
        'mode_paiement',
        'numero_quittance',
        'principale',
        'penalite',
        'majorations',
        'total_verse',
        'id_periode',
        'id_societe',
    ];

    // Relation avec la société
    public function societe()
    {
        return $this->belongsTo(Entreprise::class, 'id_societe');
    }

    // Relation avec la période
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
