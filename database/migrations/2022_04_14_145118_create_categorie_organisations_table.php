<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorieOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_organisations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('publication_id')->constrained()
                ->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('label')->nullable();
            $table->string('categorie')->nullable();
            $table->boolean('notifSansChiffreAffaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorie_organisations');
    }
}
