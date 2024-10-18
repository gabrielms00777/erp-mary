<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::insert([
            ['name' => 'Funcionários'],
            ['name' => 'Fornecedores'],
            ['name' => 'Clientes'],
            ['name' => 'Vendedores'],
        ]);
    }
}
