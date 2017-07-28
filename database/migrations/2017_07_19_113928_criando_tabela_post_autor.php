<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_autor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idblog")->unsigned();
            $table->integer("idgrupo")->unsigned();
            $table->string("nome", 120)->unique();
            $table->string("slug", 255)->unique();
            $table->string("email", 255)->unique();
            $table->string("senha", 255);
            $table->string("token", 255)->nullable()->unique();
            $table->string("remember_token", 255)->nullable()->unique();
            $table->string("imagem", 255)->nullable();
            $table->string("apelido", 60)->nullable();
            $table->text("perfil")->nullable();
            $table->boolean("inativo")->default(false);
            $table->foreign("idblog")->references("id")->on("bg_blog");
            $table->foreign("idgrupo")->references("id")->on("bg_adm_grupo");
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
