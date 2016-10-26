<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        //$this->call(ClientsTableSeeder::class);
        $this->call(QuestionTypesSeeder::class);
        //$this->call(SurveysTableSeeder::class);
        //$this->call(UsersSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
