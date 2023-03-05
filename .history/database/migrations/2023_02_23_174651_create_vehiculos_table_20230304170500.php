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
<<<<<<< HEAD:database/migrations/2023_02_23_174651_create_vehiculos_table.php
            
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
            
            $table->unsignedBigInteger('tipo_vehiculo')->default(1);
=======
            $table->integer('modelo')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('tipo_vehiculo');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('users')->references('id')->on('id_users')->onUpdate('cascade');
>>>>>>> rebeca:.history/database/migrations/2023_02_23_174651_create_vehiculos_table_20230304170500.php
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
