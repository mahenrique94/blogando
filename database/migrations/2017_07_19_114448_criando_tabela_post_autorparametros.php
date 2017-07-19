<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostAutorparametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_autorparametros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idautor")->unsigned()->unique();
            $table->boolean("revisarconteudoprimeiravez")->default(false);
            $table->boolean("revisarconteudoatualizado")->default(false);
            $table->foreign("idautor")->references("id")->on("bg_post_autor");
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
        Schema::dropIfExists('bg_post_autorparametros');
    }
}
