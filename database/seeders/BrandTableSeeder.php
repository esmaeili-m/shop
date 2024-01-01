<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brands::truncate();
        $brand=[
          'addidas',
          'nick',
          'bershka',
          'ashghal'
        ];
        foreach ($brand as $item){
            Brands::create([
                'title'=>$item,
                'category_id'=>rand(1,20),
                'slug'=>'link-'.rand(100,999),
            ]);
        }

    }
}
