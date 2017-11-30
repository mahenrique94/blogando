<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostTipovisualizacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_tipovisualizacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descricao", 120)->unique();
            $table->boolean("mostrarlegendarelacionado")->default(true);
            $table->boolean("mostrarimagem")->default(true);
            $table->boolean("mostrardatapostagem")->default(true);
            $table->boolean("mostrarcategoria")->default(true);
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
        Schema::dropIfExists('bg_post_tipovisualizacaocompartilhamento');
    }
}
