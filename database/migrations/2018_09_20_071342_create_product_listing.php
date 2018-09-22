<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       

            Schema::create('product_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lstore_id')->nullable();
            $table->unsignedInteger('lmanu_id')->nullable();
            $table->unsignedInteger('lproduct_id');
            $table->string('listing_type');
            $table->bigInteger('listing_qty');
            $table->double('listing_unitPrice');
            $table->double('listing_totalPrice');
            $table->date('listing_expiry')->nullable();
            $table->string('listing_vintage')->nullable();
            $table->string('listing_condition');
            $table->boolean('listing_active');
            $table->bigInteger('listing_seller');

            $table->foreign('lproduct_id')->references('product_id')->on('Products');
            $table->foreign('lstore_id')->references('store_id')->on('Store');
            $table->foreign('lmanu_id')->references('manu_id')->on('Manufacturers');
            $table->rememberToken();
            $table->timestamps();
        });

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_listings');
    }
}
