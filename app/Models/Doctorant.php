<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctorant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'numero_cin',
        'carte_sejour',
        'brut_indemnites',
        'id_societe',
        'id_periode',
    ];

    /**
     * Get the periode that owns the doctorant.
     */
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
