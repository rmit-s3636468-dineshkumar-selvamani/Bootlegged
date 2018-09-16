<?php

use Illuminate\Support\Facades\Schema;
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

            $table->increments('product_id');
            $table->string('product_itemName');
            $table->string('product_baseItemName');
            $table->string('product_packCode');
            $table->string('product_packCodeName');
            $table->string('product_packageId');
            $table->string('product_packageName');
            $table->unsignedInteger('product_brandId');
            $table->unsignedInteger('product_subBrandId');
            $table->string('product_netqty');
            $table->string('product_innersPerOuters');

            
            $table->timestamps();

             // $table->foreign('manu_id')->references('manu_id')->on('Manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
