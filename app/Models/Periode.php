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
        return $this->belongsTo(Entreprise::class, 'id_societe', 'id_entreprise');
    }

    // Relation avec le modèle PersonnelPermanent
    public function personnelPermanent()
    {
        return $this->hasMany(PersonnelPermanent::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle SalaireBeneficiantExoneration
    public function SalaireBeneficiantExoneration()
    {
        return $this->hasMany(SalaireBeneficiantExoneration::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle PersonnelOccasionnel
    public function PersonnelOccasionnel()
    {
        return $this->hasMany(PersonnelOccasionnel::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle Stagiaire
    public function Stagiaire()
    {
        return $this->hasMany(Stagiaire::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle Doctorant
    public function Doctorant()
    {
        return $this->hasMany(Doctorant::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle Beneficiaire_Options_Souscription
    public function BeneficiaireOptionsSouscription()
    {
        return $this->hasMany(BeneficiaireOptionsSouscription::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle BeneficiaireAbondement
    public function BeneficiaireAbondement()
    {
        return $this->hasMany(BeneficiaireAbondement::class, 'id_periode', 'id_periode');
    }

    // Relation avec le modèle Versement
    public function Versement()
    {
        return $this->hasMany(Versement::class, 'id_periode', 'id_periode');
    }

    // Ajoutez d'autres relations selon vos besoins ici
}
