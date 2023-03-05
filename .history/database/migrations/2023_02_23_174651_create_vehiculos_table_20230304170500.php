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
            $table->timestamps();
    });

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa',10);
            $table->string('marca',30);
            $table->string('modelo');
            $table->string('color',20)->nullable();
            
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            
            $table->unsignedBigInteger('tipo_vehiculo')->default(1);
            $table->foreign('tipo_vehiculo')->references('id')->on('tipo_vehiculos')->onUpdate('cascade');

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
        Schema::dropIfExists('vehiculos');
        Schema::dropIfExists('tipo_vehiculos');
        
    }
};
