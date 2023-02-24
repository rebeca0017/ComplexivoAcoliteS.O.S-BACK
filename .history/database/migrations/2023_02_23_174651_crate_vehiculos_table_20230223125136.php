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
            $table->timestamp('color',20)->nullable();
            $table->integer('modelo');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('tipo_vehiculo');
            $table->unsignedBigInteger('tipo_identificacion');
            $table->rememberToken();
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
    }
};
