<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManuTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manu_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manuSeller_id');
            $table->string('stripeId')->nullable();
            $table->integer('mTran_buyerId')->unsigned();
            $table->integer('mTran_sellerId')->unsigned();
            $table->integer('mListingId')->unsigned();
            $table->dateTime('mTran_date');
            $table->double('mTran_qty');
            $table->double('mTran_unitPrice');
            $table->double('mTran_totalPrice');
            $table->double('mTran_comission')->nullable();
            $table->double('mTran_stripeFee')->nullable();
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
        Schema::dropIfExists('manu_transactions');
    }
}
