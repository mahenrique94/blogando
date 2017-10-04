<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogAparencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_aparencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idblog")->unsigned();
            $table->string("temablog", 30)->unique();
            $table->integer("idtemamenu")->unsigned()->unique();
            $table->integer("idtemaaside")->unsigned()->unique();
            $table->integer("idtemaperfil")->unsigned()->unique();
            $table->integer("idtemanavegacao")->unsigned()->unique();
            $table->integer("idtemanotificacao")->unsigned()->unique();
            $table->boolean("mostrarpesquisa")->default(true);
            $table->boolean("mostrarredessociais")->default(true);
            $table->boolean("mostrarpostsrecentes")->default(true);
            $table->boolean("mostrarcategorias")->default(true);
            $table->boolean("mostrartags")->default(true);
            $table->boolean("mostrararquivos")->default(true);
            $table->boolean("mostrarnewsletter")->default(true);
            $table->foreign("idblog")->references("id")->on("bg_blog");
            $table->foreign("idtemamenu")->references("id")->on("bg_blog_tema");
            $table->foreign("idtemaaside")->references("id")->on("bg_blog_tema");
            $table->foreign("idtemaperfil")->references("id")->on("bg_blog_tema");
            $table->foreign("idtemanavegacao")->references("id")->on("bg_blog_tema");
            $table->foreign("idtemanotificacao")->references("id")->on("bg_blog_tema");
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
        Schema::dropIfExists('bg_blog_aparencia');
    }
}
