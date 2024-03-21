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
use App\Http\Controllers\PersonnelPermanentController;
use App\Http\Controllers\SalariesExonerationController;
use App\Http\Controllers\PersonnelOccasionnelController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\DoctorantController;
use App\Http\Controllers\BeneficiaireOSController;
use App\Http\Controllers\BeneficiaireAbondementController;
use App\Http\Controllers\VersementController;
use App\Http\Controllers\SimpleIRController;


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
	Route::get('/entreprise/pdf', [EntrepriseController::class, 'generatePdf'])->name('entreprise.pdf');
	Route::get('dashboard/{raison_sociale}/periodes', [PeriodesController::class, 'index'])->name('dashboard.periode');
	Route::get('/dashboard/{raison_sociale}/periodes/create', [PeriodesController::class, 'create'])->name('periodes.create');
	Route::post('/periodes', [PeriodesController::class, 'store'])->name('periodes.store');
	Route::delete('/periodes/{id_periode}', [PeriodesController::class, 'destroy'])->name('periodes.destroy');
	Route::get('/periodes/{id_periode}/edit', [PeriodesController::class, 'edit'])->name('periodes.edit');
	Route::put('/periodes/{id_periode}', [PeriodesController::class, 'update'])->name('periodes.update');
	Route::get('/periodes/{id_periode}/personnel-permanent', [PersonnelPermanentController::class, 'showPersonnelPermanent'])->name('periodes.personnel_permanent');
	Route::get('/periodes/personnel-permanent/create/{id_societe}/{id_periode}', [PersonnelPermanentController::class, 'create'])->name('personnel_permanent.create');
	Route::post('/periodes/personnel-permanent', [PersonnelPermanentController::class, 'store'])->name('personnel_permanent.store');
	Route::get('/periodes/personnel_permanent/{id}/edit', [PersonnelPermanentController::class, 'edit'])->name('personnel_permanent.edit');
	//calcul
	Route::post('/periodes/personnel_permanent/calcul-montants', [PersonnelPermanentController::class, 'calculMontants'])->name('calcul.montants');
    Route::post('/periodes/personnel_permanent/{id}', [PersonnelPermanentController::class, 'update'])->name('personnel_permanent.update');
    Route::delete('/periodes/personnel_permanent/{id}', [PersonnelPermanentController::class, 'destroy'])->name('personnel_permanent.destroy');
	Route::get('/PersonnelPermanentController/{id_periode}/pdf', [PersonnelPermanentController::class, 'generatePdfPersonnelPermanent'])->name('PersonnelPermanentController.pdf');
	Route::post('/ajouter-employes-annee-precedente/{id_periode}', [PersonnelPermanentController::class, 'ajouterEmployesAnneePrecedente'])->name('ajouter.employes.annee.precedente');
	Route::get('/periodes/{id_periode}/salaries-exoneration', [SalariesExonerationController::class, 'index'])->name('salaries_exoneration.index');
	Route::get('/periodes/{id_periode}/societes/{id_societe}/salaries-exoneration/create', [SalariesExonerationController::class, 'create'])->name('salaries_exoneration.create');
	Route::post('/periodes/salaries-exoneration', [SalariesExonerationController::class, 'store'])->name('salaries_exoneration.store');
	Route::delete('/periodes/salaries-exoneration/{id}', [SalariesExonerationController::class, 'destroy'])->name('salaries_exoneration.destroy');
	Route::get('/periodes/salaries-exoneration/{id}', [SalariesExonerationController::class, 'edit'])->name('salaries_exoneration.edit');
	Route::put('/periodes/salaries_exoneration/{id}', [SalariesExonerationController::class, 'update'])->name('salaries_exoneration.update');
	Route::get('/salaries_exoneration/{id_periode}/pdf', [SalariesExonerationController::class, 'generatePdf'])->name('salaries_exonerationController.pdf');
	Route::get('/periodes/periodes/{id_periode}/personnel-occasionnel', [PersonnelOccasionnelController::class, 'index'])->name('personnel_occasionnel.index');
	Route::get('/periodes/periodes/{id_periode}/personnel-occasionnel/create', [PersonnelOccasionnelController::class, 'create'])->name('personnel_occasionnel.create');
	Route::post('/periodes/personnel-occasionnel/{id_periode}', [PersonnelOccasionnelController::class, 'store'])->name('personnel_occasionnel.store');
	Route::get('/periodes/personnel_occasionnel/{id_periode}/edit/{id}', [PersonnelOccasionnelController::class, 'edit'])->name('personnel_occasionnel.edit');
	Route::delete('/periodes/personnel_occasionnel/{id_periode}/{id}', [PersonnelOccasionnelController::class ,'destroy'])->name('personnel_occasionnel.destroy');
	Route::put('/periodes/personnel_occasionnel/{id_periode}/{id_personnel}', [PersonnelOccasionnelController::class ,'update'])->name('personnel_occasionnel.update');
	Route::get('/personnel-occasionnel/pdf/{id_periode}', [PersonnelOccasionnelController::class, 'generatePdf'])->name('personnel-occasionnel.pdf');
	Route::get('/periodes/{id_periode}/stagiaire', [StagiaireController::class,'index'])->name('stagiaires.index');
	Route::get('/periodes/{id_periode}/stagiaires/create', [StagiaireController::class, 'create'])->name('stagiaires.create');
	Route::post('/periodes/stagiaires/{id_periode}/{id_societe}', [StagiaireController::class, 'store'])->name('stagiaires.store');
	Route::get('/periodes/{id_periode}/stagiaires/{id}/edit', [StagiaireController::class, 'edit'])->name('stagiaires.edit');
	Route::put('/periodes/{id_periode}/stagiaires/{id}', [StagiaireController::class, 'update'])->name('stagiaires.update');
	Route::delete('/periodes/{id_periode}/stagiaires/{id}', [StagiaireController::class, 'destroy'])->name('stagiaires.destroy');
	Route::get('stagiaires/pdf/{id_periode}', [StagiaireController::class, 'generatePdf'])->name('stagiaires.pdf');
	Route::get('/periodes/{id_periode}/doctorants', [DoctorantController::class, 'index'])->name('doctorants.index');
	Route::get('/periodes/{id_periode}/doctorants/create', [DoctorantController::class, 'create'])->name('doctorants.create');
	Route::post('/periodes/doctorants/{id_periode}/{id_societe}', [DoctorantController::class, 'store'])->name('doctorants.store');
	Route::get('/periodes/{id_periode}/societes/{id_societe}/doctorants/{id}/edit', [DoctorantController::class, 'edit'])->name('doctorants.edit');
	Route::put('/periodes/{id_periode}/societes/{id_societe}/doctorants/{id}', [DoctorantController::class, 'update'])->name('doctorants.update');
	Route::delete('/periodes/{id_periode}/societes/{id_societe}/doctorants/{id}', [DoctorantController::class, 'destroy'])->name('doctorants.destroy');
	Route::get('/doctorants/pdf/{id_periode}', [DoctorantController::class, 'generatePdf'])->name('doctorants.pdf');
	Route::get('/periodes/{id_periode}/beneficiaires', [BeneficiaireOSController::class, 'index'])->name('beneficiairesOS.index');
	Route::get('/periodes/{id_periode}/beneficiaires/create', [BeneficiaireOSController::class, 'create'])->name('beneficiairesOS.create');
	Route::post('/periodes/{id_periode}/beneficiaires/{id_societe}', [BeneficiaireOSController::class, 'store'])->name('beneficiairesOS.store');
	Route::get('/periodes/{id_periode}/beneficiaires/{id_societe}/edit', [BeneficiaireOSController::class, 'edit'])->name('beneficiairesOS.edit');
	Route::put('/periodes/{id_periode}/beneficiaires/{id_societe}', [BeneficiaireOSController::class, 'update'])->name('beneficiairesOS.update');
	Route::delete('/periodes/{id_periode}/beneficiaires/{id_societe}', [BeneficiaireOSController::class, 'destroy'])->name('beneficiairesOS.destroy');
	Route::get('/beneficiairesOS/pdf/{id_periode}', [BeneficiaireOSController::class, 'generatePDF'])->name('beneficiairesOS.pdf');
	Route::get('/periodes/{id_periode}/beneficiaires-abondement', [BeneficiaireAbondementController::class, 'index'])->name('beneficiairesAbondement.index');
	Route::get('/periodes/{id_periode}/{id_societe}/beneficiaires_abondement/create', [BeneficiaireAbondementController::class,'create'])->name('beneficiaires_abondement.create');
	Route::post('/periodes/{id_periode}/{id_societe}/beneficiaires_abondement', [BeneficiaireAbondementController::class, 'store'])->name('beneficiaires_abondement.store');
	Route::get('/periodes/{id_periode}/beneficiaires_abondement/{id_societe}/{id}/edit', [BeneficiaireAbondementController::class, 'edit'])->name('beneficiaires_abondement.edit');
	Route::put('/periodes/{id_periode}/beneficiaires_abondement/{id_societe}/{id}', [BeneficiaireAbondementController::class, 'update'])->name('beneficiaires_abondement.update');
	Route::delete('/periodes/{id_periode}/beneficiaires_abondement/{id_societe}/{id}', [BeneficiaireAbondementController::class, 'destroy'])->name('beneficiaires_abondement.destroy');
	Route::get('/beneficiaires-abondement/pdf/{id_periode}', [BeneficiaireAbondementController::class, 'generatePDF'])->name('beneficiaires_abondement.pdf');
	Route::get('/periodes/{id_periode}/versements', [VersementController::class, 'index'])->name('versements.index');
	Route::get('/periodes/{id_periode}/{id_societe}/versements/create', [VersementController::class, 'create'])->name('versements.create');
	Route::post('/periodes/{id_periode}/{id_societe}/versements', [VersementController::class, 'store'])->name('versements.store');
	Route::get('/periodes/versements/{id_periode}/edit/{id}', [VersementController::class, 'edit'])->name('versements.edit');
	Route::put('/periodes/versements/{id_periode}/update/{id}', [VersementController::class, 'update'])->name('versements.update');
	Route::delete('/periodes/versements/{id_periode}/delete/{id}', [VersementController::class, 'destroy'])->name('versements.destroy');
	Route::get('/versements/pdf/{id_periode}', [VersementController::class, 'generatePDF'])->name('versements.pdf');
	Route::get('/periodes/simple-ir}', [SimpleIRController::class, 'index'])->name('simple_ir.index');
	Route::get('/entreprise/pdf', [EntrepriseController::class, 'generatePdf'])->name('entreprise.pdf');

	


































});