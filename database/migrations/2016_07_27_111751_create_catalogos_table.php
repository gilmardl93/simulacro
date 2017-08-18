<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique('pk_catalogo');

            $table->integer('idtable');
            $table->integer('iditem');
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 50)->nullable();
            $table->string('descripcion', 200)->nullable();
            $table->integer('valor')->nullable();
            $table->boolean('activo')->default(true)->nullable();

            $table->timestamps();
            $table->unique(['idtable','iditem'],'ak_catalogo');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogo');
    }
}
