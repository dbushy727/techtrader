<?php

use App\Product;
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

        User::first()->products()->save(new Product([
            'title' => 'Macbook Air 13 inch',
            'description' => 'Late 2015 Macbook Air with Retina Display',
            'price' => 799.99
        ]));

        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->products()->save(factory(App\Product::class)->make());
        });

        $this->command->info('User table seeded!');
    }
}
