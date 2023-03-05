<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->rememberToken();
            $table->timestamps();
    });

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca',30);
            $table->string('placa',10);
            $table->string('color',20)->nullable();
            $table->integer('modelo')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('tipo_vehiculo');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('users')->references('id')->on('id_users')->onUpdate('cascade');
            $table->foreign('tipo_vehiculo')->references('id')->on('tipo_vehiculos')->onUpdate('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_vehiculos');
        Schema::dropIfExists('vehiculos');
    }
};
