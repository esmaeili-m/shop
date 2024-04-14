<?php

namespace Database\Seeders;

use App\Models\Article;
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
        $digikala = array(
            "لوازم خانگی" => array(
                "لوازم آشپزخانه" => array(
                    "قواره‌های الکتریکی" => array("میکسر", "آسیاب", "برقی"),
                    "ظروف آشپزخانه" => array("سینک", "قابلمه", "تابه"),
                    // ...
                ),
                "لوازم تصویر و صدا" => array(
                    "تلویزیون" => array("LED", "OLED", "QLED"),
                    "رادیو" => array("دیجیتال", "آنالوگ"),
                    // ...
                ),
                // ...
            ),
            "کالای دیجیتال" => array(
                "موبایل و تبلت" => array(
                    "موبایل" => array("سامسونگ", "آیفون", "هواوی"),
                    "تبلت" => array("آیپد", "سرفیس", "سامسونگ"),
                    // ...
                ),
                "لپ‌تاپ و رایانه" => array(
                    "لپ‌تاپ" => array("اپل", "دل", "ایسوس"),
                    "رایانه" => array("رایانه شخصی", "کامپیوتر مکمل"),
                    // ...
                ),
                // ...
            ),
            "پوشاک و اکسسوری" => array(
                "پوشاک مردانه" => array("پیراهن", "شلوار", "کت"),
                "پوشاک زنانه" => array("دامن", "پالتو", "بلوز"),
                // ...
            ),
            // ...
        );
        foreach ($digikala as $key => $item){
            $order=Category::max('order');
            if ($order){
                $count=$order+1;
            }else{
                $count=1;
            }
            $id=Category::create([
                'title'=>$key,
                'slug'=>$key,
                'description'=>fake()->paragraph,
                'status'=>rand(0,1),
                'order'=>$count
            ]);
            $count++;
            foreach ($item as $key2 => $item2){
                $id=Category::create([
                    'title'=>$key2,
                    'slug'=>$key2,
                    'parent_id'=>$id->id,
                    'description'=>fake()->paragraph,
                    'status'=>rand(0,1),
                    'order'=>$count
                ]);
                $count++;
                foreach ($item2 as $key3 => $item3){
                    $id=Category::create([
                        'title'=>$key3,
                        'slug'=>$key3,
                        'parent_id'=>$id->id,
                        'description'=>fake()->paragraph,
                        'status'=>rand(0,1),
                        'order'=>$count
                    ]);
//                    foreach ($item3 as $key4 => $item4) {
//                        $id=Category::create([
//                            'title'=>$key4,
//                            'slug'=>$key4,
//                            'parent_id'=>$id->id,
//                            'description'=>fake()->paragraph,
//                            'status'=>rand(0,1),
//                            'order'=>$count
//                        ]);
//                    }
                }
            }
        }
//       Category::truncate();
//       for ($i=0;$i<20;$i++){
//           Category::create([
//               'title'=>fake()->title,
//               'slug'=>fake()->title,
//               'description'=>fake()->paragraph,
//               'status'=>rand(0,1),
//               'order'=>$i+1
//           ]);
//       }
    }
}
