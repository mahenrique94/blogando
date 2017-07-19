<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostAutorredesocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_autorredesocial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idautor")->unsigned();
            $table->integer("idredesocial")->unsigned()->unique();
            $table->string("link", 255)->unique();
            $table->foreign("idautor")->references("id")->on("bg_post_autor");
            $table->foreign("idredesocial")->references("id")->on("bg_cad_redesocial");
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
        Schema::dropIfExists('bg_post_autorredesocial');
    }
}
