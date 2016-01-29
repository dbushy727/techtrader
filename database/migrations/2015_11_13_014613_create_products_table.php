<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('condition_id')->unsigned()->default(0);
            $table->string('title');
            $table->string('brand');
            $table->string('model_number')->nullable();
            $table->string('basic_description', 160);
            $table->longText('description');
            $table->float('price');
            $table->nullableTimestamps();


            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
