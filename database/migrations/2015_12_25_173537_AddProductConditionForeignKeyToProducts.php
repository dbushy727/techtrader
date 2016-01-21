<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductConditionForeignKeyToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('product_condition_id')->unsigned()->default(0);

            $table->foreign('product_condition_id')->references('id')->on('product_conditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_product_condition_id_foreign');
            $table->dropColumn('product_condition_id');
        });
    }
}
