<?php

use TechTrader\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
