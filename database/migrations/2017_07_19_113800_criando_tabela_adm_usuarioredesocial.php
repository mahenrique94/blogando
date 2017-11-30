<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmUsuarioredesocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_usuarioredesocial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idusuario")->unsigned();
            $table->integer("idredesocial")->unsigned()->unique();
            $table->string("link", 255)->unique();
            $table->foreign("idusuario")->references("id")->on("bg_adm_usuario");
            $table->foreign("idredesocial")->references("id")->on("bg_cad_redesocial");
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
        Schema::dropIfExists('bg_adm_usuarioredesocial');
    }
}
