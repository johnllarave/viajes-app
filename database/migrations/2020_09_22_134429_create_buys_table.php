<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->id('id_buy');
            $table->string('medio');
            $table->string('total_vuelo');
            $table->string('total_hotel');
            $table->string('reserva_vuelo');
            $table->string('reserva_hotel');
            $table->string('img_compra')->nullable();
            $table->unsignedBigInteger('id_quotation')->nullable();
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
        Schema::dropIfExists('buys');
    }
}
