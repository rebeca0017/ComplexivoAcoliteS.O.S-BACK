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
        Schema::create('mecanicos', function (Blueprint $table) {
        $table->id();
        
        $table->unsignedBigInteger('id_user'); 
        $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade');
        
        $table->text('descripcion')->nullable();
        $table->string('disponibilidad')->nullable();

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
        Schema::dropIfExists('mecanicos');
    }
};
