<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LagKommuneTabell extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kommune', function(Blueprint $table) {
         $table->charset = 'utf8';
         $table->collation = 'utf8_unicode_ci';
         $table->engine = 'InnoDB';

         $table->char('postnr', 4);
         $table->string('kommunenavn', 150);

         $table->rememberToken();
         $table->timestamps();

         $table->primary('postnr');
         $table->index('kommunenavn');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('kommune');
    }
}
