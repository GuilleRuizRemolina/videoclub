<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('anio');
            $table->string('sinopsis',1000);
            $table->integer('duracion');
            $table->string('pais');
            $table->string('imagen');
            $table->integer('copias');
            $table->integer('propietario_id');
            $table->integer('director_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {
            Schema::dropIfExists('peliculas');
        });
    }
}
