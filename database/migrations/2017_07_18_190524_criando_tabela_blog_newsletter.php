<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogNewsletter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_newsletter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idblog")->unsigned();
            $table->string("nome", 120)->nullable();
            $table->string("email", 255);
            $table->boolean("inativo")->default(false);
            $table->boolean("acompanharposts")->default(false);
            $table->boolean("acompanharcomentarios")->default(false);
            $table->boolean("acompanharrespostas")->default(false);
            $table->foreign("idblog")->references("id")->on("bg_blog");
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
        Schema::dropIfExists('bg_blog_newsletter');
    }
}
