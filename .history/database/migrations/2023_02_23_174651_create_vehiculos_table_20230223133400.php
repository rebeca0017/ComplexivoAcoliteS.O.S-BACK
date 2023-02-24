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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('marca',30);
            $table->string('placa',10)->unique();
            $table->string('color',20)->nullable();
            $table->integer('modelo')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('tipo_vehiculo');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vehiculos');
    }
};
