<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden')->default(0);
            $table->string('sector',10)->nullable();
            $table->string('codigo',10)->nullable();
            $table->integer('capacidad')->default(0);
            $table->integer('disponible')->default(0);
            $table->integer('asignado')->default(0);
            $table->boolean('activo')->default(false);
            $table->boolean('habilitado')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aula');
    }
}
