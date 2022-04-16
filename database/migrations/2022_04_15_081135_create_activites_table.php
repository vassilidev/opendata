<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exercice_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->dateTime('publicationDate');
            $table->string('identifiantFiche')->nullable();
            $table->string('objet')->nullable();
            $table->json('domainesIntervention')->nullable();
            $table->json('actionsRepresentationInteret')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
}
