<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogNewsletterparametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_newsletterparametros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idblog")->unsigned();
            $table->text("textoacompanharposts");
            $table->text("textoacompanharcomentarios");
            $table->text("textoacompanharrespostas");
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
        Schema::dropIfExists('bg_blog_newsletterparametros');
    }
}
