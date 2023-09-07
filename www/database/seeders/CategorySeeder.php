<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arry_data = array(
            ["ジャケット", 1],
            ["パーカー", 1],
            ["コート", 1],
            ["Tシャツ", 2],
            ["ポロシャツ", 2],
            ["カジュアルシャツ", 2],
            ["アンクルパンツ", 3],
            ["スキニーパンツ", 3],
            ["ジーンズ", 3]
        );
        foreach($arry_data as $item){
            Category::create([
                'category_name' => $item[0],
                'description' => '',
                'parent_category_id' => $item[1],
            ]);
        }

    }
}
