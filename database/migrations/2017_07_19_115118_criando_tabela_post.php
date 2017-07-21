<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idautor")->unsigned();
            $table->integer("idsituacao")->unsigned();
            $table->string("titulo", 120)->unique();
            $table->string("slug", 255)->unique();
            $table->string("link", 255)->unique();
            $table->string("imagem", 255);
            $table->text("conteudo");
            $table->text("conteudohtml");
            $table->text("conteudomarkdown");
            $table->string("conteudoresumido", 255);
            $table->timestamp("datapostagem");
            $table->boolean("rascunho")->default(false);
            $table->boolean("inativo")->default(false);
            $table->foreign("idautor")->references("id")->on("bg_post_autor");
            $table->foreign("idsituacao")->references("id")->on("bg_post_situacao");
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
        Schema::dropIfExists('bg_post');
    }
}