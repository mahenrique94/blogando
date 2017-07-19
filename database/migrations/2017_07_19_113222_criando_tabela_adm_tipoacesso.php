<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmTipoacesso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_tipoacesso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idpermissao")->unsigned();
            $table->string("descricao", 60)->unique();
            $table->string("slug", 120)->unique();
            $table->foreign("idpermissao")->references("id")->on("bg_adm_permissao");
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
        Schema::dropIfExists('bg_adm_tipoacesso');
    }
}
