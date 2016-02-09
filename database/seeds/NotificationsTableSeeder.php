<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\User;
use TechTrader\Seeders\Fertilizer;
use TechTrader\Models\Notification;

class NotificationsTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            for ($i=1; $i < 5; $i++) {
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'message' => $this->faker->sentence(),
                ]);
            }
        }

    }
}
