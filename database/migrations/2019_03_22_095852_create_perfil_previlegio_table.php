<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilPrevilegioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil_previlegio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfil_id')->unsigned()->nullable();
            $table->foreign('perfil_id')->references('id')
                 ->on('perfils')->onDelete('cascade');
            $table->integer('previlegio_id')->unsigned()->nullable();
            $table->foreign('previlegio_id')->references('id')
                 ->on('previlegios')->onDelete('cascade');
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
        Schema::dropIfExists('perfil_previlegio');
    }
}
