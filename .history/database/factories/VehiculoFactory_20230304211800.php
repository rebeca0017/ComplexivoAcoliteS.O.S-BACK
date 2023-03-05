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
            
                'marca'=>$this->faker->word,
                'placa'=>$this->faker->word,
                'color'=>$this->faker->word,
                'modelo'=>$this->faker->word,
                'id_users'=>$this->faker->word,
                'tipo_vehiculo'=>$this->faker->word

            
        ];
    }
}
