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
        $categories = [
            'Computers',
            'Tablets',
            'Gaming',
            'Networking',
            'General',
            'Audio',
            'Accessories',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        $this->command->info('Category table seeded!');
    }
}
