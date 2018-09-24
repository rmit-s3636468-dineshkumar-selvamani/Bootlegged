<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listings', function (Blueprint $table) {

            $table->foreign('lstore_id')->references('store_id')->on('Store');
            $table->foreign('lmanu_id')->references('manu_id')->on('Manufacturers');
            $table->foreign('lproduct_id')->references('product_id')->on('products');
        });

        Schema::table('manu_transactions', function (Blueprint $table) {

            $table->foreign('mListingId')->references('id')->on('listings');
        });

        Schema::table('store_transactions', function (Blueprint $table) {

            $table->foreign('sListingId')->references('id')->on('listings');
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
