<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('store_id')->references('store_id')->on('Store');
            $table->foreign('manu_id')->references('manu_id')->on('Manufacturers');
        });


        Schema::table('Store', function (Blueprint $table) {

            $table->foreign('businessGroup_Id')->references('group_id')->on('businessGroups');

        });


        Schema::table('store_listings', function (Blueprint $table) {

            $table->foreign('store_id')->references('store_id')->on('Store');

        });


        Schema::table('manu_listings', function (Blueprint $table) {

            $table->foreign('manu_id')->references('manu_id')->on('Manufacturers');

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
