<?php

/**
 * Created by PhpStorm.
 * User: GIANGPHAM
 * Date: 10/10/2016
 * Time: 6:17 PM
 */
class ClientsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run(){

        $faker = \Faker\Factory::create();



        //\App\Models\Client::truncate();


        for($i = 0; $i<10;$i++){
            \App\Models\Client::create([
                'id'=> $faker->uuid,
                'user_id'=>2,

            ]);
        }
    }
}