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
            $table->bigIncrements('id');
            $table->bigInteger("idpost")->unsigned();
            $table->integer("idtipoestatistica")->unsigned();;
            $table->integer("idperfil")->unsigned();
            $table->unique(["idpost", "idtipoestatistica", "idperfil"]);
            $table->foreign("idpost")->references("id")->on("bg_post");
            $table->foreign("idtipoestatistica")->references("id")->on("bg_post_tipoestatistica");
            $table->foreign("idperfil")->references("id")->on("bg_tbl_perfil");
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
