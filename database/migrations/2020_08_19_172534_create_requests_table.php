<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            //$table->string('empresa')->nullable();
            $table->string('tipo_solicitud');
            $table->boolean('viaticos');
            $table->string('justificacion');

            $table->string('alimentacion');
            $table->string('kilometros');
            $table->string('otro');
            $table->string('total');

            $table->string('tipo_viaje_1');
            $table->string('origen_1');
            $table->string('destino_1');
            $table->string('fecha_salida_1');
            $table->string('fecha_retorno_1');
            $table->string('dias_1');
            $table->boolean('hotel_1');
            $table->boolean('equipaje_1');
            $table->string('jornada_1');

            $table->string('tipo_viaje_2')->nullable();
            $table->string('origen_2')->nullable();
            $table->string('destino_2')->nullable();
            $table->string('fecha_salida_2')->nullable();
            $table->string('fecha_retorno_2')->nullable();
            $table->string('dias_2')->nullable();
            $table->boolean('hotel_2')->nullable();
            $table->boolean('equipaje_2')->nullable();
            $table->string('jornada_2')->nullable();

            $table->string('tipo_viaje_3')->nullable();
            $table->string('origen_3')->nullable();
            $table->string('destino_3')->nullable();
            $table->string('fecha_salida_3')->nullable();
            $table->string('fecha_retorno_3')->nullable();
            $table->string('dias_3')->nullable();
            $table->boolean('hotel_3')->nullable();
            $table->boolean('equipaje_3')->nullable();
            $table->string('jornada_3')->nullable();

            $table->text('observacion')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();

            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('state_id')->nullable();
            //$table->foreign('state_id')->references('id')->on('states');

            $table->text('observacion_estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
