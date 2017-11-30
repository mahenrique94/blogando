<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaTblPerfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_tbl_perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idgrupo")->unsigned();
            $table->integer("idusuario")->unsigned();
            $table->string("nome", 120)->unique();
            $table->string("slug", 255)->unique();
            $table->string("imagem", 255)->nullable();
            $table->string("apelido", 60)->nullable();
            $table->text("descricao")->nullable();
            $table->boolean("inativo")->default(false);
            $table->unique(["idusuario", "idgrupo"]);
            $table->foreign("idgrupo")->references("id")->on("bg_adm_grupo");
            $table->foreign("idusuario")->references("id")->on("bg_adm_usuario");
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
        Schema::dropIfExists('bg_post_autor');
    }
}
