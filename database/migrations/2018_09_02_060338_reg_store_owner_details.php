<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegStoreOwnerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Store', function (Blueprint $table) {
           $table->increments('store_id');
           $table->unsignedInteger('businessGroup_Id')->nullable();
        $table->string('store_email')->unique();
            $table->string('store_name');
           
            $table->string('store_address');
            $table->string('store_suburb');
            $table->string('store_state');
            $table->bigInteger('store_postcode');
            $table->bigInteger('store_phone');
            $table->string('store_abn');
            $table->string('store_license');
            $table->double('store_Stripeid');

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
        Schema::dropIfExists('Store');
    }
}
