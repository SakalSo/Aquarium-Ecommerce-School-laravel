<?php

use App\ProductVariant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            UsersTableSeeder::class,
            CustomersTableSeeder::class,
            StaffsTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
        ]);
    }
}
