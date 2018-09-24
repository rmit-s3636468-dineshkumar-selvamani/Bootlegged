<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lstore_id')->nullable();
            $table->unsignedInteger('lmanu_id')->nullable();
            $table->integer('lproduct_id')->unsigned();
            $table->string('Listing_type');
            $table->bigInteger('Listing_qty');
            $table->double('Listing_unitPrice');
            $table->double('Listing_totalPrice');
            $table->date('Listing_expiry')->nullable();
            $table->string('Listing_vintage')->nullable();
            $table->string('Listing_condition');
            $table->binary('image')->nullable();
            $table->boolean('Listing_active');
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
        Schema::dropIfExists('listings');
    }
}
