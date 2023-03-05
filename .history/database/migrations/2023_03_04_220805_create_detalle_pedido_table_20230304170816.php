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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_vehiculo');
            $table->string('ubicacion');
            $table->string('detalles')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('id_user')->references('id')->on('id_user')->onUpdate('cascade'); 
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
