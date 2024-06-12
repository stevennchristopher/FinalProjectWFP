<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['type' => 'Single',
             'price' => 10,
             'image' => 'single',
             'hotel_id' => 5],

            ['type' => 'Double',
             'price' => 20,
             'image' => 'double',
             'hotel_id' => 4],

            ['type' => 'Suite',
             'price' => 30,
             'image' => 'suite',
             'hotel_id' => 3],

            ['type' => 'Balcony',
             'price' => 40,
             'image' => 'balcony',
             'hotel_id' => 2],

            ['type' => 'President',
             'price' => 50,
             'image' => 'president',
             'hotel_id' => 1]
        ]);
    }
}
