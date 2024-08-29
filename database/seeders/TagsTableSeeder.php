<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'AI', 'slug' => 'ai'],
            ['name' => 'Blockchain', 'slug' => 'blockchain'],
            ['name' => 'Movies', 'slug' => 'movies'],
            ['name' => 'Fitness', 'slug' => 'fitness'],
        ]);
    }
}