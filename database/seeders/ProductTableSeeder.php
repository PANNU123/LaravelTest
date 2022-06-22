<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'title'=>'Product one',
            'sku'=>'product_one',
            'price'=>250,
            'qty'=>rand(50,100),
            'description'=>'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum',
        ]);
        Product::create([
            'title'=>'Product two',
            'sku'=>'product_two',
            'price'=>250,
            'qty'=>rand(50,100),
            'description'=>'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum',
        ]);
        Product::create([
            'title'=>'Product three',
            'sku'=>'product_three',
            'price'=>250,
            'qty'=>rand(50,100),
            'description'=>'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum',
        ]);
        Product::create([
            'title'=>'Product four',
            'sku'=>'product_four',
            'price'=>250,
            'qty'=>rand(50,100),
            'description'=>'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum',
        ]);
        Product::create([
            'title'=>'Product five',
            'sku'=>'product_five',
            'price'=>250,
            'qty'=>rand(50,100),
            'description'=>'Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum',
        ]);
    }
}
