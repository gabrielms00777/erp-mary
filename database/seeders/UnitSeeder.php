<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create(['name' => 'Quilograma']);
        Unit::create(['name' => 'Litro']);
        Unit::create(['name' => 'Unidade']);
        Unit::create(['name' => 'Caixa']);
    }
}
