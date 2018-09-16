<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')->nullable();
            $table->unsignedInteger('manu_id')->nullable();
            $table->string('business_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('verifiedStatus');

            $table->string('type');
            $table->string('permissions');

            $table->foreign('store_id')->references('store_id')->on('Store');
            $table->foreign('manu_id')->references('manu_id')->on('Manufacturers');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
