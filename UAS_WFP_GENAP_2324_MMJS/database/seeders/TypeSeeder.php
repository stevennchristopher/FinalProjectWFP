<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'Inn'],
            ['name' => 'Resort'],
            ['name' => 'Motels'],
            ['name' => 'Convention'],
            ['name' => 'Boutique']
        ]);
    }
}
