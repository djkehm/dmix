<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mixes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('descripcion');
            $table->time('duracion');
            $table->date('fecha_publicacion');
            $table->integer('precio');
            $table->unsignedBigInteger('dj_id');
            $table->timestamps();
            $table->softDeletes();
            
            //Relaciones:
            $table->foreign('dj_id')->references('id')->on('djs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mixes');
    }
}
