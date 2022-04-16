<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->dateTime('publicationDate')->nullable();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->string('chiffreAffaire')->nullable();
            $table->boolean('hasNotChiffreAffaire')->nullable();
            $table->string('montantDepense')->nullable();
            $table->integer('nombreSalaries')->nullable();
            $table->integer('exerciceId')->nullable();
            $table->boolean('noActivite')->nullable();
            $table->integer('nombreActivite')->nullable();
            $table->boolean('defautDeclaration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercices');
    }
}
