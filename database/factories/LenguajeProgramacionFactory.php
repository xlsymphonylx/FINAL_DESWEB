<?php

namespace Database\Factories;

use App\Models\LenguajeProgramacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class LenguajeProgramacionFactory extends Factory
{
    protected $model = LenguajeProgramacion::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
  
    public function definition()
    {
        return [
            'descripcion' => $this->faker->name(),
        ];
    }
}
