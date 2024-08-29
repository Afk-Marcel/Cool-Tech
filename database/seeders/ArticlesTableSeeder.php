<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->insert([
            [
                'title' => 'Latest Tech Trends',
                'content' => 'Content about the latest in tech.',
                'category_id' => 1, 
            ],
            [
                'title' => 'Business Strategies for 2024',
                'content' => 'Content about business strategies.',
                'category_id' => 2, 
            ],
            [
                'title' => 'Entertainment Highlights',
                'content' => 'Content about the entertainment industry.',
                'category_id' => 3, 
            ],
            [
                'title' => 'Health Tips for a Better Life',
                'content' => 'Content about health and wellness.',
                'category_id' => 4,
            ],
        ]);
    }
}