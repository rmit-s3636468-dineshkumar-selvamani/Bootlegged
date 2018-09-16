<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreListing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id');
            $table->bigInteger('product_id');
            $table->string('sListing_type');
            $table->bigInteger('sListing_qty');
            $table->double('sListing_unitPrice');
            $table->double('sListing_totalPrice');
            $table->date('sListing_expiry');
            $table->string('sListing_vintage');
            $table->string('sListing_condition');
            $table->boolean('sListing_active');

               $table->foreign('store_id')->references('store_id')->on('Store');
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
        Schema::dropIfExists('store_listings');
    }
}
