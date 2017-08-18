<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idpostulante')->nullable();
            $table->string('sede')->nullable();
            $table->decimal('puntaje','10','3')->nullable();
            $table->decimal('nota','10','3')->nullable();
            $table->boolean('asistio')->nullable();
            $table->integer('merito')->nullable();
            $table->integer('merito_sede')->nullable();
            $table->mediumtext('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado');
    }
}
