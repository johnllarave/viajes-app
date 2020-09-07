<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('vuelo')->nullable();
            $table->string('aerolinea')->nullable();
            $table->string('hotel')->nullable();
            $table->string('viaticos')->nullable();
            $table->string('alimento')->nullable();
            $table->boolean('aprobacion')->default(false);
            $table->timestamps();

            $table->unsignedBigInteger('requests_id')->nullable();
            $table->foreign('requests_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
