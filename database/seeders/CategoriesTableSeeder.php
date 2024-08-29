<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Tech', 'slug' => 'tech'],
            ['name' => 'Business', 'slug' => 'business'],
            ['name' => 'Entertainment', 'slug' => 'entertainment'],
            ['name' => 'Health', 'slug' => 'health'],
        ]);
    }
}