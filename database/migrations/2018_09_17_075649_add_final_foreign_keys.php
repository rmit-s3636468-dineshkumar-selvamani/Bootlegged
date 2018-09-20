<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('store_transactions', function (Blueprint $table) {
            $table->foreign('storeSeller_id')->references('store_id')->on('Store');
            $table->foreign('sTran_buyerId')->references('id')->on('users');
            $table->foreign('sListingId')->references('id')->on('store_listings');
        });

        Schema::table('manu_transactions', function (Blueprint $table) {
            $table->foreign('manuSeller_id')->references('manu_id')->on('Manufacturers');
            $table->foreign('mTran_buyerId')->references('id')->on('users');
            $table->foreign('mListingId')->references('id')->on('manu_listings');
            $table->foreign('mTran_sellerId')->references('id')->on('users');
        });


        Schema::table('store_listings', function (Blueprint $table) {
            $table->foreign('sproduct_id')->references('product_id')->on('products');
        });

        Schema::table('manu_listings', function (Blueprint $table) {
            $table->foreign('mproduct_id')->references('product_id')->on('products');
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
