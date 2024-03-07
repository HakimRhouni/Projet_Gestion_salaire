<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'raison_sociale',
        'nom',
        'prenom',
        'n_cin',
        'n_carte_sejour',
        'siege_social',
        'commune',
        'telephone',
        'fax',
        'email',
        'forme_juridique',
        'id_fiscal',
        'n_taxe_pro',
        'regime',
        'numero_ice',
        'numero_rc',
        'n_cnss',
        'modele',
        'date_creation',
        'date_premier_acte_exploitation',
        'debut_exercice',
        'compte_dgi',
        'mot_de_passe_compte_dgi',
    ];
    public function setMotDePasseCompteDgiAttribute($value)
    {
        $this->attributes['mot_de_passe_compte_dgi'] = bcrypt($value);
    }
    public function periodes()
{
    return $this->hasMany(Periode::class, 'id_societe', 'id');
}
}
