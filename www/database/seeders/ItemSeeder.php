<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i <100; $i++){
            Item::create([
                'name' => "テスト商品" . $i+1,
                'price' => rand(1000, 5000),
                'description' => '',
                'image' => "img/noimage.jpeg",
                'category_id' => rand(1, 9),
            ]);
        }
    }
}
