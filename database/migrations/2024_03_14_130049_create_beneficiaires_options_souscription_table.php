<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiairesOptionsSouscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires_options_souscription', function (Blueprint $table) {
            $table->id('id_beneficiaire_options_souscription');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin');
            $table->string('carte_sejour');
            $table->string('num_cnss');
            $table->string('id_fiscal');
            $table->string('organisme');
            $table->unsignedInteger('nbr_actions_acquises');
            $table->unsignedInteger('nbr_actions_distribuees');
            $table->decimal('prix_acquisition', 20, 2);
            $table->date('date_attribution');
            $table->decimal('valeur_action_attribution', 20, 2);
            $table->date('date_levee_option')->nullable();
            $table->decimal('valeur_action_levee', 20, 2)->nullable();
            $table->date('date_cession')->nullable();
            $table->unsignedInteger('nbr_actions_cedees')->nullable();
            $table->decimal('montant_abondement', 20, 2)->nullable();
            $table->decimal('complement_salaire', 20, 2)->nullable();
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id_entreprise')->on('entreprises')->onDelete('cascade');
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periodes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaires_options_souscription');
    }
}