<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostEstatisticas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_estatisticas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("idpost")->unsigned()->unique();
            $table->integer("curtidas");
            $table->integer("visualizacoes");
            $table->integer("compartilhamentos");
            $table->foreign("idpost")->references("id")->on("bg_post");
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
        Schema::dropIfExists('bg_post_estatisticas');
    }
}
