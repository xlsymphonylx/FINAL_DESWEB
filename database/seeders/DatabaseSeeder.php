<?php

namespace Database\Seeders;

use App\Models\Criptomoneda;
use App\Models\LenguajeProgramacion;
use Database\Seeders\Criptomoneda as SeedersCriptomoneda;
use Database\Seeders\LenguajeProgramacion as SeedersLenguajeProgramacion;
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
        $this->call([SeedersLenguajeProgramacion::class, SeedersCriptomoneda::class,]);
    }
}
