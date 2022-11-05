<?php

namespace Database\Factories;

use App\Models\Criptomoneda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CriptomonedaFactory extends Factory
{
    protected $model = Criptomoneda::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
  
    public function definition()
    {
        return [
            'logotipo' => $this->faker->name(),
            'nombre' => $this->faker->name(),
            'precio' => $this->faker->randomFloat(2,1,1000),
            'descripcion' => $this->faker->name(),
            'lenguaje_id' => 1,
            'fecha_creacion' => $this->faker->date(),
        ];
    }
}
