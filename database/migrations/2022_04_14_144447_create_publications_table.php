<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('typeIdentifiantNational')->nullable();
            $table->string('denomination')->nullable();
            $table->boolean('publierMonAdressePhysique')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('ville')->nullable();
            $table->string('pays')->nullable();
            $table->boolean('publierMonAdresseEmail')->nullable();
            $table->boolean('publierMonTelephoneDeContact')->nullable();
            $table->string('lienSiteWeb')->nullable();
            $table->string('lienPageTwitter')->nullable();
            $table->string('lienPageFacebook')->nullable();
            $table->string('lienPageLinkedin')->nullable();
            $table->boolean('declarationTiers')->nullable();
            $table->boolean('declarationOrgaAppartenance');
            $table->boolean('isActivitesPubliees')->nullable();
            $table->string('identifiantNational')->nullable();
            $table->dateTime('datePremierePublication')->nullable();
            $table->dateTime('dateCreation')->nullable();
            $table->dateTime('dateDernierePublicationActivite')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
