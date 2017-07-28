<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaNotificacaoAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_notificacaoautor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idautor")->unsigned();
            $table->bigInteger("idnotificacao")->unsigned();
            $table->foreign("idautor")->references("id")->on("bg_post_autor");
            $table->foreign("idnotificacao")->references("id")->on("bg_blog_notificacao");
            $table->unique(["idautor", "idnotificacao"]);
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
        Schema::dropIfExists('bg_blog_notificacaoautor');
    }
}
