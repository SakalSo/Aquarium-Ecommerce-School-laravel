<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        //make the left over user as staff
        $halfUserCount = (int) (User::count() / 2);
        $leftOverUserCount = (int) (User::count() - $halfUserCount);
        
        $users = User::skip($halfUserCount)
            ->take($leftOverUserCount)
            ->pluck('user_id')
            ->toArray();

        //create customers
        for($i = 0; $i < $leftOverUserCount; $i++){
            App\Staff::create([
                'user_id' => $faker->randomElement($users),
            ]);
        }
    }
}
