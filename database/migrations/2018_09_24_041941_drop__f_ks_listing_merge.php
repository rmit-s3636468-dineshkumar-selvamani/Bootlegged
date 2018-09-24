<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFKsListingMerge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_transactions', function (Blueprint $table) {
            $table->dropForeign(['sListingId']);
        });

        Schema::table('manu_transactions', function (Blueprint $table) {
            $table->dropForeign(['mListingId']);
        });

        Schema::table('store_listings', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
            $table->dropForeign(['sproduct_id']);

        });


        Schema::table('manu_listings', function (Blueprint $table) {
            $table->dropForeign(['manu_id']);
            $table->dropForeign(['mproduct_id']);

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
