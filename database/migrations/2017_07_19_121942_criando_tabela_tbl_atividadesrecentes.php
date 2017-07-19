<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaTblAtividadesrecentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_tbl_atividadesrecentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idautor")->unsigned();
            $table->string("descricao", 255);
            $table->foreign("idautor")->references("id")->on("bg_post_autor");
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
        Schema::dropIfExists('bg_tbl_atividadesrecentes');
    }
}
