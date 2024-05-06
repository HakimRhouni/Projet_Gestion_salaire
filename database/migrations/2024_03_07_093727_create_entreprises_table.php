<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id('id_entreprise');
            $table->string('raison_sociale')->nullable(false); // Raison Sociale, champ obligatoire
            $table->string('nom')->nullable(); // Nom
            $table->string('prenom')->nullable(); // Prénom
            $table->string('n_cin')->nullable(); // N CIN
            $table->string('n_carte_sejour')->nullable(); // N Carte séjour
            $table->string('siege_social')->nullable(); // Siege social
            $table->string('commune')->nullable(false); // Commune, champ obligatoire
            $table->string('telephone')->nullable(); // Téléphone
            $table->string('fax')->nullable(); // Fax
            $table->string('email')->nullable(); // Email
            $table->string('forme_juridique')->nullable(false); // Forme juridique, champ obligatoire
            $table->string('id_fiscal')->nullable(false); // Identifiant fiscal, champ obligatoire
            $table->string('n_taxe_pro')->nullable(); // N taxe pro
            $table->string('regime')->nullable(false); // Régime, champ obligatoire
            $table->string('numero_ice')->nullable(); // Numéro ICE
            $table->string('numero_rc')->nullable(); // Numéro RC
            $table->string('n_cnss')->nullable(); // N CNSS
            $table->string('modele')->nullable(false); // Modelé Comptable, champ obligatoire
            $table->date('date_creation')->nullable(); // Date Création
            $table->date('date_premier_acte_exploitation')->nullable(); // Date 1er acte d’exploitation
            $table->date('debut_exercice')->nullable(); // Début d’exercice
            $table->string('compte_dgi')->nullable(); // Compte DGI
            $table->string('mot_de_passe_compte_dgi')->nullable(); // Mot de passe du Compte DGI
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}
