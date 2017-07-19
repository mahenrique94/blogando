<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("idpost")->unsigned();
            $table->integer("idcategoria")->unsigned()->unique();
            $table->foreign("idpost")->references("id")->on("bg_post");
            $table->foreign("idcategoria")->references("id")->on("bg_cad_categoria");
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
        Schema::dropIfExists('bg_post_categoria');
    }
}
