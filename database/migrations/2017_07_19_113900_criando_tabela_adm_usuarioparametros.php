<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmUsuarioparametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_usuarioparametros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idusuario")->unsigned()->unique();
            $table->boolean("revisarconteudoprimeiravez")->default(false);
            $table->boolean("revisarconteudoatualizado")->default(false);
            $table->foreign("idusuario")->references("id")->on("bg_adm_usuario");
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
        Schema::dropIfExists('bg_adm_usuarioparametros');
    }
}
