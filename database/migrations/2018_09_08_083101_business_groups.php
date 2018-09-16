<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('BusinessGroups', function (Blueprint $table) {
            $table->increments('group_id');
            $table->string('group_name');
            $table->string('group_address');
            $table->string('group_state');
            $table->string('group_suburb');
            $table->string('group_postcode');
            $table->string('group_phone');
            $table->string('group_email');
            $table->string('group_abn');
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
         Schema::dropIfExists('BusinessGroups');
    }
}
