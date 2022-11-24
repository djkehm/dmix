<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_generos', function (Blueprint $table) {
            $table->unsignedBigInteger('mix_id');
            $table->unsignedBigInteger('genero_id');
            $table->primary(['mix_id','genero_id']);
            $table->timestamps();


            //RELACIONES:
            $table->foreign('mix_id')->references('id')->on('mixes');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mix_generos');
    }
}
