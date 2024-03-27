<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiaireAbondementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires_abondement', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin');
            $table->string('carte_sejour')->nullable();
            $table->string('commune')->nullable();
            $table->string('numero_plan');
            $table->integer('duree_annees');
            $table->date('date_ouverture');
            $table->decimal('montant_abondement', 20, 2);
            $table->decimal('montant_annuel_revenu_imposable', 20, 2);
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id')->on('entreprises')->onDelete('cascade');
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
        Schema::dropIfExists('beneficiaires_abondement');
    }
}
