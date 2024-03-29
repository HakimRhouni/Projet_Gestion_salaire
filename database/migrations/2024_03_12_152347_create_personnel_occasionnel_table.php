<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelOccasionnelTable extends Migration
{
    public function up()
    {
        Schema::create('personnel_occasionnel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id')->on('entreprises')->onDelete('cascade');
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periodes')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('cin')->unique();
            $table->string('carte_sejour')->nullable();
            $table->string('numero_cnss');
            $table->string('id_fiscal');
            $table->string('profession');
            $table->decimal('montant_brut', 20, 2);
            $table->decimal('ir_preleve', 20, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personnel_occasionnel');
    }
}
