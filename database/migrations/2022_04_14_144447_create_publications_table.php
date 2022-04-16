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
            $table->longText('typeIdentifiantNational')->nullable();
            $table->longText('denomination')->nullable();
            $table->boolean('publierMonAdressePhysique')->nullable();
            $table->longText('codePostal')->nullable();
            $table->longText('ville')->nullable();
            $table->longText('pays')->nullable();
            $table->boolean('publierMonAdresseEmail')->nullable();
            $table->boolean('publierMonTelephoneDeContact')->nullable();
            $table->longText('lienSiteWeb')->nullable();
            $table->longText('lienPageTwitter')->nullable();
            $table->longText('lienPageFacebook')->nullable();
            $table->longText('lienPageLinkedin')->nullable();
            $table->boolean('declarationTiers')->nullable();
            $table->boolean('declarationOrgaAppartenance');
            $table->boolean('isActivitesPubliees')->nullable();
            $table->longText('identifiantNational')->nullable();
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
