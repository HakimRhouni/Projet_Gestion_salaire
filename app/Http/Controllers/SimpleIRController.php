<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Entreprise;

class SimpleIRController extends Controller
{
    public function index($id_periode)
    {
        $id_societe = Periode::findOrFail($id_periode)->id_societe;
        $periode = Periode::findOrFail($id_periode);
        $raison_sociale = $periode->entreprise->raison_sociale;
        $entreprise = Entreprise::where('raison_sociale', $raison_sociale)->firstOrFail();
        return view('pages.simple_ir', compact( 'id_periode', 'id_societe','entreprise'));
    }
  
}
