<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periodes';
    protected $primaryKey = 'id_periode';

    protected $fillable = [
        'id_societe',
        'annee',
        'debut_exercice',
        'fin_exercice',
    ];

    // Relation avec le modèle Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_societe', 'id');
    }
}
 