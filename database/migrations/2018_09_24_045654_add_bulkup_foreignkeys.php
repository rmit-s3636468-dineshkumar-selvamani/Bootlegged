<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulkupForeignkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulk_uploads', function (Blueprint $table) {

            $table->foreign('bu_store_id')->references('store_id')->on('Store');
            $table->foreign('bu_manu_id')->references('manu_id')->on('Manufacturers');
            $table->foreign('bu_user_id')->references('id')->on('users');
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
