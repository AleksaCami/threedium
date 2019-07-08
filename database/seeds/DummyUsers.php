<?php

use Illuminate\Database\Seeder;
use App\User;

class DummyUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        User::create(
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678')
            ]
        );
    }
}
