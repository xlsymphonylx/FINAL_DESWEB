<?php

namespace Database\Seeders;

use App\Models\Criptomoneda as ModelsCriptomoneda;
use Illuminate\Database\Seeder;

class Criptomoneda extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsCriptomoneda::factory()->times(1000)->create();
    }
}
