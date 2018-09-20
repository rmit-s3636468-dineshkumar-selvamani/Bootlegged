<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->increments('sale_id');
            $table->unsignedInteger('store_id')->nullable();
            $table->unsignedInteger('manuf_id')->nullable();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('SOH_qty');
            $table->double('cost_price');
            $table->double('sale30qty');
            $table->double('sale60qty');
            $table->double('sale90qty');
            $table->double('sale_price');
            $table->dateTime('last_sale_date');
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
        Schema::dropIfExists('product_sales');
    }
}
