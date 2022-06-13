<?php

namespace Database\Factories;

use App\Models\Conductor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ConductorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conductor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conductors_nombre' => $this->faker->name(),
            'conductors_apellido' => $this->faker->lastname(),
            'conductors_identificacion' => $this->faker->ean8(),
            'conductors_direccion' => $this->faker->streetAddress(),
            'conductors_telefono' => $this->faker->phoneNumber(),
            'ciudads_id'=> mt_rand(1,9),
            'pais_id' => mt_rand(1,9), 
            'supervisors_id' => mt_rand(1,9),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
 
}
