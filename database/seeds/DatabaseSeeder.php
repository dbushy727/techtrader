<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductConditionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductCategoryTableSeeder::class);
        $this->call(ProductImageTableSeeder::class);
        Model::reguard();
    }
}
