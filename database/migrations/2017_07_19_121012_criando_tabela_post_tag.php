<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger("idpost")->unsigned();
            $table->integer("idtag")->unsigned();
            $table->foreign("idpost")->references("id")->on("bg_post");
            $table->foreign("idtag")->references("id")->on("bg_cad_tag");
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
        Schema::dropIfExists('bg_post_tag');
    }
}
