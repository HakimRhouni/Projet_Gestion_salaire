<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelOccasionnel extends Model
{
    use HasFactory;

    protected $table = 'personnel_occasionnel';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'cin',
        'carte_sejour',
        'numero_cnss',
        'id_fiscal',
        'profession',
        'montant_brut',
        'ir_preleve',
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
