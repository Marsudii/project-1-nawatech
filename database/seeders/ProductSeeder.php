<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name_product' => 'Kawasaki 1',
            'slug_product' => Str::slug('Kawasaki 1'),
            'price' => '2.000.000',
            'qty' => '5',
            'image_product' => '1.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name_product' => 'Kawasaki 2',
            'slug_product' => Str::slug('Kawasaki 2'),
            'price' => '6.000.000',
            'qty' => '5',
            'image_product' => '2.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name_product' => 'Kawasaki 3',
            'slug_product' => Str::slug('Kawasaki 3'),
            'price' => '1.000.000',
            'qty' => '5',
            'image_product' => '3.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name_product' => 'Kawasaki 4',
            'slug_product' => Str::slug('Kawasaki 4'),
            'price' => '4.000.000',
            'qty' => '5',
            'image_product' => '4.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name_product' => 'Kawasaki 5',
            'slug_product' => Str::slug('Kawasaki 5'),
            'price' => '9.000.000',
            'qty' => '5',
            'image_product' => '5.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
