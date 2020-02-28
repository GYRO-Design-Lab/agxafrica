<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('merchant_id')->unsigned();
            $table->string('commodity');
            $table->string('specification')->nullable();
            $table->string('location');
            $table->string('quantity');
            $table->float('price');
            $table->enum('trade_type', ['buy', 'sell']);
            $table->string('photo');
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
        Schema::dropIfExists('market');
    }
}
