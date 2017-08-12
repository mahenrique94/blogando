<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_comentario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("idpost")->unsigned();
            $table->bigInteger("idcomentario")->unsigned()->nullable();
            $table->string("nome", 120);
            $table->string("email", 255);
            $table->text("comentario");
            $table->boolean("avisarnovoscomentarios")->default(false);
            $table->boolean("avisarrespostas")->default(false);
            $table->boolean("aprovado")->default(true);
            $table->foreign("idpost")->references("id")->on("bg_post");
            $table->foreign("idcomentario")->references("id")->on("bg_post_comentario");
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
        Schema::dropIfExists('bg_post_comentario');
    }
}
