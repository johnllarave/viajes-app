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
            $table->string('aerolinea')->nullable();
            $table->string('valor_tiquete')->nullable();
            $table->string('iva_vuelo')->nullable();
            $table->string('otros_cargos')->nullable();
            $table->string('fecha')->nullable();
            $table->string('hora')->nullable();
            $table->string('cabina')->nullable();
            $table->string('img')->nullable();
            $table->string('valor_noche')->nullable();
            $table->string('iva_hotel')->nullable();
            $table->string('viaticos')->nullable();
            $table->string('img_hotel')->nullable();
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
