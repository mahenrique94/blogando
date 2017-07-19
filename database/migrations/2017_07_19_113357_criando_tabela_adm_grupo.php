<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idtipoacesso")->unsigned();
            $table->string("descricao", 60)->unique();
            $table->string("slug", 120)->unique();
            $table->foreign("idtipoacesso")->references("id")->on("bg_adm_tipoacesso");
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
        Schema::dropIfExists('bg_adm_grupo');
    }
}
