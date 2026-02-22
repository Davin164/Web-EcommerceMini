<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop Gaming', 'category_id' => 1, 'price' => 15000000, 'stock' => 10],
            ['name' => 'Headphone Wireless', 'category_id' => 1, 'price' => 500000, 'stock' => 20],
            ['name' => 'Kaos Polos', 'category_id' => 2, 'price' => 75000, 'stock' => 50],
            ['name' => 'Sepatu Lari', 'category_id' => 4, 'price' => 350000, 'stock' => 30],
            ['name' => 'Vitamin C', 'category_id' => 5, 'price' => 50000, 'stock' => 100],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => 'Deskripsi produk ' . $product['name'],
                'price' => $product['price'],
                'stock' => $product['stock'],
            ]);
        }
    }
}
