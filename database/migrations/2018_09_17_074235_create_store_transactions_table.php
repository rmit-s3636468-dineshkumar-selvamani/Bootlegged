<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('storeSeller_id');
            $table->string('sTran_stripeId')->nullable();
            $table->integer('sTran_buyerId')->unsigned();
            $table->integer('sListingId')->unsigned();
            $table->dateTime('sTran_date');
            $table->double('sTran_qty');
            $table->double('sTran_unitPrice');
            $table->double('sTran_totalPrice');
            $table->double('sTran_comission')->nullable();
            $table->double('sTran_stripeFee')->nullable();
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
        Schema::dropIfExists('store_transactions');
    }
}
