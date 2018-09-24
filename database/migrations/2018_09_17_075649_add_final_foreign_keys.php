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
        });

        Schema::table('manu_transactions', function (Blueprint $table) {
            $table->foreign('manuSeller_id')->references('manu_id')->on('Manufacturers');
            $table->foreign('mTran_buyerId')->references('id')->on('users');
            $table->foreign('mTran_sellerId')->references('id')->on('users');
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
