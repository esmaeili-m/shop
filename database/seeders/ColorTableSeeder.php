<?php

namespace Database\Seeders;

use App\Models\Colors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Colors::truncate();
        $data=[
            [
                'title'=>'blue',
                'color'=>'#0e73f3'
            ],
            [
                'title'=>'red',
                'color'=>'#f30e2a'
            ],
            [
                'title'=>'yellow',
                'color'=>'#f3e50e',
            ],
            [
                'title'=>'green',
                'color'=>'#0ef315'
            ],
            [
                'title'=>'purple',
                'color'=>'#f30ec2'
            ],
            [
                'title'=>'orange',
                'color'=>'#f3aa0e',
            ]
        ];
        foreach ($data as $item){
            Colors::create([
                'title'=>$item['title'],
                'code'=>$item['color']
            ]);
        }

    }
}
