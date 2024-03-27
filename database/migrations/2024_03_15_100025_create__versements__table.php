<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versements', function (Blueprint $table) {
            $table->id();
            $table->string('mois');
            $table->string('reference');
            $table->date('date_versement');
            $table->string('mode_paiement');
            $table->string('numero_quittance');
            $table->decimal('principale', 20, 2);
            $table->decimal('penalite', 20, 2);
            $table->decimal('majorations', 20, 2);
            $table->decimal('total_verse', 20, 2);

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
        Schema::dropIfExists('versements');
    }
}
