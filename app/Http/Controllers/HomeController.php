<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Entreprise;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer tous les utilisateurs avec leurs rôles
        $users = User::with('roles')->get();

        // Récupérer toutes les entreprises
        $entreprises = Entreprise::all();

        // Passer les utilisateurs et les entreprises à la vue de tableau de bord
        return view('pages.dashboard', compact('users', 'entreprises'));
    }
}
