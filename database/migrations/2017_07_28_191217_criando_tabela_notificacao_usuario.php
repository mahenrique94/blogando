<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaNotificacaoUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_notificacaousuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idperfil")->unsigned();
            $table->bigInteger("idnotificacao")->unsigned();
            $table->foreign("idperfil")->references("id")->on("bg_tbl_perfil");
            $table->foreign("idnotificacao")->references("id")->on("bg_blog_notificacao");
            $table->unique(["idperfil", "idnotificacao"]);
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
        Schema::dropIfExists('bg_blog_notificacaousuario');
    }
}
