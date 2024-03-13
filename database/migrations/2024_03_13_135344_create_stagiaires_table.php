<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin');
            $table->string('carte_sejour');
            $table->string('numero_cnss');
            $table->string('id_fiscal');
            $table->decimal('montant_brut');
            $table->decimal('indemnite');
            $table->decimal('retenues');
            $table->decimal('net_imposable');
            $table->unsignedBigInteger('periode');
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
        Schema::dropIfExists('stagiaires');
    }
}
