<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMixInterpretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mix_interpretes', function (Blueprint $table) {
            $table->unsignedBigInteger('mix_id');
            $table->unsignedBigInteger('interprete_id');
            $table->primary(['mix_id','interprete_id']);
            $table->timestamps();

            //RELACIONES:
            $table->foreign('mix_id')->references('id')->on('mixes');
            $table->foreign('interprete_id')->references('id')->on('interpretes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mix_interpretes');
    }
}
