<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductSalesForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_sales', function (Blueprint $table) {
            $table->foreign('store_id')->references('store_id')->on('Store');
            $table->foreign('manuf_id')->references('manu_id')->on('Manufacturers');
            $table->foreign('product_id')->references('product_id')->on('products');
            //$table->foreign('businessGroup_Id')->references('group_id')->on('businessGroups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
