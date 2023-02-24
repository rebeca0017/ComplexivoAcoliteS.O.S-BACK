<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoIdentificacion;
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
        $this->call(UserSeeder::class);
        //Usuarios para empezar 
        User::factory(10)->create()->each(function($user){
            $user->assignRole('mecanico');
        });
    

        TipoIdentificacion::factory()->create(['provincia_id'=>'15','nombre'=>'cedula']);
        TipoIdentificacion::factory()->create(['provincia_id'=>'15','nombre'=>'pasaporte']);
        TipoIdentificacion::factory()->create(['provincia_id'=>'15','nombre'=>'ruc']);
        
    }
}
