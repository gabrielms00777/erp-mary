<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = [
            'Eletrônicos',
            'Alimentos',
            'Maquinários',
            'Roupas',
            'Móveis',
            'Ferramentas',
            'Livros',
            'Brinquedos',
            'Automóveis',
            'Cosméticos',
        ];

        foreach ($productTypes as $type) {
            ProductType::create(['name' => $type]);
        }
    }
}
