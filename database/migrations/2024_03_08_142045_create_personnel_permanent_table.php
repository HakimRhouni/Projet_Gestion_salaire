<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelPermanentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_permanents', function (Blueprint $table) {
            $table->id('id_personnel_permanent');
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id_entreprise')->on('entreprises')->onDelete('cascade');
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periodes')->onDelete('cascade');
            $table->string('matricule');
            $table->string('lf_employe');
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin')->nullable();
            $table->string('carte_sejour')->nullable();
            $table->string('cnss')->nullable();
            $table->string('situation_famille')->nullable();
            $table->string('adresse')->nullable();
            $table->decimal('salaire_base_annuel', 20, 2)->nullable();
            $table->decimal('montant_brut', 20, 2)->nullable();
            $table->decimal('montant_avantages', 20, 2)->nullable();
            $table->decimal('montant_indemnites', 20, 2)->nullable();
            $table->decimal('montant_exoneres', 20, 2)->nullable();
            $table->decimal('montant_revenu_brut_imposable', 20, 2)->nullable();
            $table->decimal('montant_frais_professionnels', 20, 2)->nullable();
            $table->decimal('montant_cotisations', 20, 2)->nullable();
            $table->decimal('montant_autres_retenues', 20, 2)->nullable();
            $table->decimal('montant_echeances', 20, 2)->nullable();
            $table->decimal('revenu_net_imposable', 20, 2)->nullable();
            $table->integer('nb_reductions_charge_famille')->nullable();
            $table->integer('periode_jours')->nullable();
            $table->date('date_permis_habiter')->nullable();
            $table->decimal('ir_preleve', 20, 2)->nullable();
            $table->date('date_autorisation_construire')->nullable();

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
        Schema::dropIfExists('personnel_permanent');
    }
}
