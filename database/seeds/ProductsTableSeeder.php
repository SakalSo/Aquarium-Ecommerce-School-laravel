<?php
use App\Product;
use App\Category;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        
    }

    //get category_id
    private function selectId(string $CategoryName)
    {
        return Category::where('category_name',$CategoryName)->value('category_id');
    }

    //push product name into array
    private function insertProductName(&$data, $id, ...$productNames)
    {
        foreach($productNames as $productName)
        {
            $temp =  [
                'product_name' => $productName,
                'category_id' => $id
            ];
            array_push($data, $temp);
        }
    }
   
}
