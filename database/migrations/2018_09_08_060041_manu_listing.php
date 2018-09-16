<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ManuListing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('manu_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manu_id');
            $table->bigInteger('product_id');
            $table->string('mListing_type');
            $table->bigInteger('mListing_qty');
            $table->double('mListing_unitPrice');
            $table->double('mListing_totalPrice');
            $table->date('mListing_expiry');
            $table->string('mListing_vintage');
            $table->string('mListing_condition');
            $table->boolean('mListing_active');
            $table->bigInteger('mListing_seller');
            $table->timestamps();

             $table->foreign('manu_id')->references('manu_id')->on('Manufacturers');
             // $table->foreign('product_id')->references('store_id')->on('Store');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
               Schema::dropIfExists('manu_listings');
    }
}
