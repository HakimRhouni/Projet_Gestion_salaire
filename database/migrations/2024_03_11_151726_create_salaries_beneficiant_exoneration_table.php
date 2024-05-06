<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesBeneficiantExonerationTable extends Migration
{
    public function up()
    {
        Schema::create('salaries_beneficiant_exoneration', function (Blueprint $table) {
            $table->id('id_salarie_beneficiant_exoneration');
            $table->unsignedBigInteger('id_societe');
            $table->foreign('id_societe')->references('id_entreprise')->on('entreprises')->onDelete('cascade');
            $table->unsignedBigInteger('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periodes')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('adresse');
            $table->string('numero_cin');
            $table->string('carte_sejour')->nullable();
            $table->string('numero_cnss');
            $table->string('id_fiscale');
            $table->date('date_recrutement');
            $table->integer('periode_en_jours');
            $table->decimal('brut_traitements', 20, 2);
            $table->decimal('avantages', 20, 2);
            $table->decimal('indemnite', 20, 2);
            $table->decimal('revenu_brut_imposable', 20, 2);
            $table->decimal('retenues_operees', 20, 2);
            $table->decimal('revenu_net_imposable', 20, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salaries_beneficiant_exoneration');
    }
}
