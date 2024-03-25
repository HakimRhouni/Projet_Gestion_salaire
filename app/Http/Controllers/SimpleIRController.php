<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;

class SimpleIRController extends Controller
{
    public function index($id_periode)
    {
        $id_societe = Periode::findOrFail($id_periode)->id_societe;
        return view('pages.simple_ir', compact( 'id_periode', 'id_societe'));
    }
  
}
