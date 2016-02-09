<?php

use Illuminate\Database\Seeder;
use TechTrader\Models\Condition;
use TechTrader\Seeders\Fertilizer;

class ConditionTableSeeder extends Fertilizer
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            [
                'name' => 'Mint',
                'color' => 'mint',
            ],
            [
                'name' => 'New',
                'color' => 'new',
            ],
            [
                'name' => 'Like New',
                'color' => 'like_new',
            ],
            [
                'name' => 'Good',
                'color' => 'good',
            ],
            [
                'name' => 'Fair',
                'color' => 'fair',
            ],
            [
                'name' => 'Poor',
                'color' => 'poor',
            ],
            [
                'name' => 'Very Poor',
                'color' => 'very_poor',
            ],
            [
                'name' => 'Broken',
                'color' => 'broken',
            ],
        ];

        foreach ($conditions as $condition) {
            Condition::create([
                'name' => array_get($condition, 'name'),
                'color' => array_get($condition, 'color')
            ]);
        }
    }
}
