<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LagBrukerTabell extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bruker', function(Blueprint $table) {
         $table->charset = 'utf8';
         $table->collation = 'utf8_unicode_ci';
         $table->engine = 'InnoDB';

         $table->increments('id'); // Denne skal ha innebygd AutoInc.
         $table->string('fornavn', 150);
         $table->string('etternavn', 150);
         $table->char('telefon', 8);
         $table->string('epost', 100)->unique();
         $table->string('passord', 100);
         $table->string('adresse', 100);
         $table->char('postnr', 4);
         $table->date('fødselsdato');
         $table->boolean('har_sertifikat');
         $table->boolean('konto_aktiv');
         $table->date('dato_aktivert');
         $table->date('dato_deaktivert');

         $table->rememberToken();
         $table->timestamps();

         $table->index('etternavn', 'fornavn');
      });

      Schema::table('bruker', function($table) {
         $table->foreign('postnr')->references('postnr')->on('kommune');
   });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('bruker');
    }
}
