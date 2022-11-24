<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('mix_id');
            $table->date('fecha_solicitud');
            $table->date('fecha_actualizacion');
            $table->string('estado');
            $table->timestamps();

            //RELACIONES:
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->foreign('mix_id')->references('id')->on('mixes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_ventas');
    }
}
