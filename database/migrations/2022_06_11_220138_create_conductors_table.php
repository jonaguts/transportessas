<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateconductorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductors', function (Blueprint $table) {
            $table->id('id');
            $table->string('conductors_nombre');
            $table->string('conductors_apellido');
            $table->integer('conductors_identificacion');
            $table->string('conductors_direccion');
            $table->integer('conductors_telefono');
            $table->unsignedBigInteger('ciudads_id')->nullable();
            $table->unsignedBigInteger('supervisors_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();
            $table->foreign('ciudads_id')->references('id')->on('ciudads')->onDelete('cascade');
            $table->foreign('supervisors_id')->references('id')->on('supervisors')->onDelete('cascade');
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
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
        Schema::dropIfExists('conductors');
    }
}
