<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Computers'
        ]);

        Category::create([
            'name' => 'Tablets & Cell Phones'
        ]);

        Category::create([
            'name' => 'Gaming'
        ]);

        Category::create([
            'name' => 'Networking'
        ]);

        Category::create([
            'name' => 'General Electronics'
        ]);

        Category::create([
            'name' => 'Audio'
        ]);

        Category::create([
            'name' => 'Accessories'
        ]);
        $this->command->info('Category table seeded!');
    }
}
