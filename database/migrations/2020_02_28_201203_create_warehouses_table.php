<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('merchant_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->string('manager')->comment('company/person in charge');            
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone');
            $table->string('size');
            $table->string('capacity');
            $table->string('photo');
            $table->json('commodities');            
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
        Schema::dropIfExists('warehouses');
    }
}
