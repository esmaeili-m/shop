<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Category::truncate();
       for ($i=0;$i<20;$i++){
           Category::create([
               'title'=>fake()->title,
               'slug'=>fake()->title,
               'description'=>fake()->paragraph,
               'status'=>rand(0,1),
           ]);
       }
    }
}
