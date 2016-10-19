<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Shayne Foo',
            'email' => 'shaynefoo@example.com',
            'password' => bcrypt('123456'),
            'role' => '1'
        ]);

        User::create([
            'name' => 'Shayne Foo therapist',
            'email' => 'shaynefoo@test.com',
            'password' => bcrypt('123456'),
            'role' => '2'
        ]);
    }
}
