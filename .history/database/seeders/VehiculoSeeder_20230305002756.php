<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::create([
            'marca' => 'toyota',
            'placa' => 'ABC123',
            'color' => 'negro',
            'modelo'=>'2021',
            'id_users'=>1,
            'tipo_vehiculo'=>2,
            ]);
            
    }
}
