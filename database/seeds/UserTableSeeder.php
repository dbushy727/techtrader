<?php

use App\User;
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
            'password' => Hash::make('danbush123')
        ]);

        factory(App\User::class, 50)->create();
    }
}
