<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'password' => Hash::make('danbush')
        ])->products()->save(factory(App\Product::class)->make());

        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->products()->save(factory(App\Product::class)->make());
        });

        $this->command->info('User table seeded!');
    }
}
