<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $x=0;
        $barcode=0;
//        Posts::truncate();
        while ($x<50){
            if ($x<1){
                $barcode=10000;
            }else{
                $barcode+=$x;
            }
            Posts::create([
               'title'=>fake()->text(10),
               'slug'=>'link-'.rand(10000,99999),
               'image'=>'uploads/posts/test/test.jpg',
               'status'=>rand(0,1),
               'category_id'=>rand(1,20),
               'barcode'=>$barcode
            ]);
            $x++;

        }
    }
}
