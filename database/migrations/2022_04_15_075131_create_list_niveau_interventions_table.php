<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListNiveauInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_niveau_interventions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->longText('code')->nullable();
            $table->longText('label')->nullable();
            $table->longText('categorie')->nullable();
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
        Schema::dropIfExists('list_niveau_interventions');
    }
}
