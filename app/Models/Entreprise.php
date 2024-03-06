<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = ['raison_sociale', 'id_fiscal', 'forme_juridique', 'regime', 'modele', 'telephone'];
}

