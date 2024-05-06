<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    public function up()
    {
        Schema::create('periodes', function (Blueprint $table) {
            $table->id('id_periode');
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id_entreprise')->on('entreprises')->onDelete('cascade');
            $table->integer('annee');
            $table->date('debut_exercice');
            $table->date('fin_exercice');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periodes');
    }
}
