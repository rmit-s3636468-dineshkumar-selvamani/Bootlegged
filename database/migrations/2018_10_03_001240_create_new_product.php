<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pstore_id')->nullable();
            $table->unsignedInteger('pmanu_id')->nullable();
            $table->string('Product_name');
            $table->string('Product_type');
            $table->string('Product_brand');
            $table->string('Product_subbrand');
            $table->string('Product_packagename');
            $table->bigInteger('Product_qty');
            $table->double('Product_unitPrice');
            $table->double('Product_totalPrice');
            $table->date('Product_expiry')->nullable();
            $table->string('Product_vintage')->nullable();
            $table->string('Product_condition');
            $table->bigInteger('Product_barcode');
            $table->timestamps();

            $table->foreign('pstore_id')->references('store_id')->on('Store');
            $table->foreign('pmanu_id')->references('manu_id')->on('Manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newproducts');
    }
}
