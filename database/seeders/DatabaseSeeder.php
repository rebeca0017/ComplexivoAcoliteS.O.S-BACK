<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\Mecanico;
use App\Models\TipoIdentificacion;
use App\Models\TipoVehiculo;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Roles y Permisos
        $this->call(RoleSeeder::class);
        //usuario
        $this->call(UserSeeder::class);
        //Usuarios para empezar 
        /* User::factory(10)->create()->each(function($user){
            $user->assignRole('mecanico'); */
        /* }); */

        /* Cliente::factory(5)->create();
        Mecanico::factory(1)->create(); */

        TipoVehiculo::factory()->create(['nombre'=>'auto']);
    }
}
