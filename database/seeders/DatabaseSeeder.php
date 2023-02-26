<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use App\Models\TipoVehiculo;
use App\Models\User;
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
        /* $this->call(UserSeeder::class); */
        //Usuarios para empezar 
       /*  User::factory(10)->create()->each(function($user){
            $user->assignRole('mecanico');
        });
    
        Cliente::factory(10)->create(); */

        TipoVehiculo::factory()->create(['nombre'=>'moto']);
        TipoVehiculo::factory()->create(['nombre'=>'auto']);
        TipoVehiculo::factory()->create(['nombre'=>'camion']);
        TipoVehiculo::factory()->create(['nombre'=>'camioneta']);
        TipoVehiculo::factory()->create(['nombre'=>'buseta']);
    }
}
