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
<<<<<<< HEAD:.history/database/migrations/2023_02_23_190150_create_mecanico_table_20230223140552.php
        Schema::dropIfExists('mecanico');
=======
        Schema::dropIfExists('vehiculos');
>>>>>>> rebeca:.history/database/migrations/2023_03_04_220616_create_vehiculos_table_20230304170615.php
    }
};
