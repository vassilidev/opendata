<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->longText('denomination')->nullable();
            $table->dateTime('dateAjout')->nullable();
            $table->boolean('ancienClient')->nullable();
            $table->longText('identifiantNational')->nullable();
            $table->longText('typeIdentifiantNational')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
