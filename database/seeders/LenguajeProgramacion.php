<?php

namespace Database\Seeders;

use App\Models\LenguajeProgramacion as ModelsLenguajeProgramacion;
use Illuminate\Database\Seeder;

class LenguajeProgramacion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsLenguajeProgramacion::factory()->times(1000)->create();
    }
}
