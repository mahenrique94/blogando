<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogMidia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_midia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idblog")->unsigned()->unique();
            $table->integer("idtipomidia")->unsigned()->unique();
            $table->string("nome", 120)->unique();
            $table->string("caminho", 255);
            $table->string("slug", 255)->unique();
            $table->string("hash", 255)->unique();
            $table->foreign("idblog")->references("id")->on("bg_blog");
            $table->foreign("idtipomidia")->references("id")->on("bg_blog_tipomidia");
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
        Schema::dropIfExists('bg_blog_midia');
    }
}
