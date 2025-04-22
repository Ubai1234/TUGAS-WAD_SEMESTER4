<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Produk A',
            'price' => 10000
        ]);

        Product::create([
            'name' => 'Produk B',
            'price' => 20000
        ]);
    }
}
