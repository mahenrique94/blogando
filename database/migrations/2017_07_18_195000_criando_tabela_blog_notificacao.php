<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogNotificacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_notificacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("idtiponotificacao")->unsigned();
            $table->string("descricao", 255);
            $table->foreign("idtiponotificacao")->references("id")->on("bg_blog_tiponotificacao");
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
        Schema::dropIfExists('bg_blog_notificacao');
    }
}
