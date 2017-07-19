<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmPermissao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_permissao', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descricao", 60)->unique();
            $table->boolean("salvar");
            $table->boolean("editar");
            $table->boolean("listar");
            $table->boolean("deletar");
            $table->boolean("visualizar");
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
        Schema::dropIfExists('bg_adm_permissao');
    }
}
