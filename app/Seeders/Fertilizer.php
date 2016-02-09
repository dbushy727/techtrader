<?php

namespace TechTrader\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class Fertilizer extends Seeder
{
    /**
     * Faker Generator
     *
     * @var Faker\Generator
     */
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }
}
