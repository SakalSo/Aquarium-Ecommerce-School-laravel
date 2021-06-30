<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['category_name' => 'tank'],
            ['category_name' => 'fish'],
            ['category_name' => 'shrimp'],
            ['category_name' => 'accessory'],
        ];
        foreach($data as $dataRow){
            Category::create($dataRow);
        }
    }
}
