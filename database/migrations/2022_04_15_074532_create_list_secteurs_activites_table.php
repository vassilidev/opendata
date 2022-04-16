<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListSecteursActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_secteurs_activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('label')->nullable();
            $table->string('categorie')->nullable();
            $table->integer('ordre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_secteurs_activites');
    }
}
