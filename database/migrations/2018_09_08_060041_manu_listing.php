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
            $table->integer('mproduct_id')->unsigned();
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
