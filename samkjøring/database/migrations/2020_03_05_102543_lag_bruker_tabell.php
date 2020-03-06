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
         $table->string('fornavn', 150)->nullable($value = true);
         $table->string('etternavn', 150)->nullable($value = true);
         $table->char('telefon', 8)->nullable($value = true);
         $table->string('epost', 100)->unique()->nullable($value = true);
         $table->string('passord', 100)->nullable($value = true);
         $table->string('adresse', 100)->nullable($value = true);
         $table->char('postnr', 4)->nullable($value = true);
         $table->date('fødselsdato')->nullable($value = true);
         $table->boolean('har_sertifikat')->nullable($value = true);
         $table->boolean('konto_aktiv')->nullable($value = true);
         $table->date('dato_aktivert')->nullable($value = true);
         $table->date('dato_deaktivert')->nullable($value = true);

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
