<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog', function (Blueprint $table) {
            $table->increments("id");
            $table->string("titulo", 120)->unique();
            $table->string("slug", 255)->unique();
            $table->string("url", 255)->unique();
            $table->string("path", 255)->nullable();
            $table->string("descricao", 255);
            $table->string("keywords", 255)->nullable();
            $table->string("imagem", 255);
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
        Schema::dropIfExists('bg_blog');
    }
}
