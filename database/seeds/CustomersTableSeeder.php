<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        $halfUserCount = (int) (User::count() / 2);
        
        $users = User::take($halfUserCount)
            ->pluck('user_id')
            ->toArray();

        //create customers
        for($i = 0; $i < $halfUserCount; $i++){
            App\Customer::create([
                'point' => $faker->numberBetween(0,100),
                'user_id' => $faker->randomElement($users)
            ]);
        }
    }
}
