<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table['products']->insert([
            ['name' =>'Sepatu Nike',
             'description' =>'Sepatu Bola',
             'price' => 500000,
             'stock' => 10,
             'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?',
             'product_category_id'=>1,
            ],
            ['name' =>'Kemeja Biru',
             'description' =>'Kemeja santai lengan panjang',
             'price' => 250000,
             'stock' => 20,
             'image' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?q=80&w=1376&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
             'product_category_id'=>2,
            ],
             ['name' =>'Topi Dope',
             'description' =>'Topi Masa kini',
             'price' => 90000,
             'stock' => 15,
             'image' => 'https://images.unsplash.com/photo-1483103068651-8ce44652c331?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
             'product_category_id'=>3,
            ],
        ]);
    }
}
