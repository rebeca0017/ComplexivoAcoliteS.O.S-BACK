<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'marca' => 'toyota',
            'placa' => 'ABC123',
            'color' => 'negro',
            'modelo'=>'2021',
            'id_users'=>1,
            'tipo_vehiculo'=>2,
        ];
    }
}