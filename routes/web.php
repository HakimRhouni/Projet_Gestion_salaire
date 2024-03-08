<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;      
use App\Http\Controllers\UserManagementController;   
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\PeriodesController;    
            

Route::get('/', function () {return redirect('/dashboard');})->middleware('auth');
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management')->middleware('auth');
	Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
	Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
	Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
	Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
	Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])
    ->name('virtual-reality')
    ->middleware('role:admin');
	//->middleware('role:admin,user');
	//Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static'); 
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static'); 
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
	Route::get('/entreprise/supprimer/{id}', [EntrepriseController::class, 'supprimer'])->name('entreprise.supprimer');
	Route::post('/ajouter-entreprise', [EntrepriseController::class, 'ajouter'])->name('ajouter-entreprise');
	Route::get('/modifier-entreprise/{id}', [EntrepriseController::class, 'showModifierForm'])->name('modifier-entreprise');
	Route::put('/modifier-entreprise/{id}', [EntrepriseController::class, 'modifier'])->name('modifier-entreprise.update');
	Route::get('dashboard/{raison_sociale}/periodes', [PeriodesController::class, 'index'])->name('dashboard.periode');
	Route::get('/dashboard/{raison_sociale}/periodes/create', [PeriodesController::class, 'create'])->name('periodes.create');
	Route::post('/periodes', [PeriodesController::class, 'store'])->name('periodes.store');
	Route::delete('/periodes/{id_periode}', [PeriodesController::class, 'destroy'])->name('periodes.destroy');
	Route::get('/periodes/{id_periode}/edit', [PeriodesController::class, 'edit'])->name('periodes.edit');
	Route::put('/periodes/{id_periode}', [PeriodesController::class, 'update'])->name('periodes.update');





});