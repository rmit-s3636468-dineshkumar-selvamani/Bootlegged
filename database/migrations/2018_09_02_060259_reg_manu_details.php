<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RegManuDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('Manufacturers', function (Blueprint $table) {
            $table->increments('manu_id');
            $table->string('manu_email')->unique();
            $table->string('manu_name');
           
            $table->string('manu_address');
            $table->string('manu_suburb');
            $table->string('manu_state');
            $table->bigInteger('manu_postcode');
            $table->bigInteger('manu_phone');
            $table->string('manu_abn');
            $table->string('manu_license');
            $table->double('manu_Stripeid');
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
        Schema::dropIfExists('Manufacturers');
    }
}
