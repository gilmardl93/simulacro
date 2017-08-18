<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaudacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaudacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recibo',11)->unique();
            $table->string('servicio',3)->nullable();
            $table->mediumtext('descripcion')->nullable();
            $table->decimal('monto','9','3')->nullable();
            $table->date('fecha')->nullable();
            $table->string('codigo',11)->nullable();
            $table->string('nombrecliente',100)->nullable();
            $table->integer('idpostulante')->nullable();
            $table->string('banco',100)->nullable();
            $table->string('referencia',100)->nullable();

            $table->timestamps();
            $table->foreign('idpostulante')->references('id')->on('postulante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recaudacion');
    }
}
