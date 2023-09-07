<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\parent_category;

class ParentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent_category::create([
            'parent_category_name' => 'アウター',
            'description' => '',
        ]);
        parent_category::create([
            'parent_category_name' => 'トップス',
            'description' => '',   
        ]);
        parent_category::create([
            'parent_category_name' => 'ボトムス',
            'description' => '',   
        ]);
    }
}
