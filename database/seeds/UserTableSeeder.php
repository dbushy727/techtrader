<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\User;
use TechTrader\Seeders\Fertilizer;

class UserTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Danny',
            'email' => 'dbushy727@gmail.com',
            'password' => Hash::make('password123')
        ]);

        factory(User::class, 50)->create();
    }
}
