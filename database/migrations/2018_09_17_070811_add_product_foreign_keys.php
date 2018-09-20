<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_brandId')->references('brand_id')->on('product_brands');
            $table->foreign('product_subBrandId')->references('subBrand_id')->on('product_sub_brands');
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
