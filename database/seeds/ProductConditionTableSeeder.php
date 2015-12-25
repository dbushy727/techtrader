<?php

use App\ProductCondition;
use Illuminate\Database\Seeder;

class ProductConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Mint',
            'New',
            'Like New',
            'Good',
            'Fair',
            'Poor',
            'Very Poor',
            'Broken'
        ];

        foreach ($names as $name) {
            ProductCondition::create([
                'name' => $name
            ]);
        }
    }
}
