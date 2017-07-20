<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaBlogParametros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_blog_parametros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idblog")->unsigned()->unique();
            $table->integer("idtipoparametro")->unsigned();
            $table->integer("idformatodata")->unsigned();
            $table->integer("idformatohora")->unsigned();
            $table->integer("idcategoriapadrao")->unsigned();
            $table->integer("idtipovisualizacaopostsrelacionados")->unsigned();
            $table->integer("idtipocompartilhamento")->unsigned();
            $table->boolean("usarmarkdown")->default(false);
            $table->integer("quantidadepostsporpagina");
            $table->boolean("mostrarpostsrelacionados")->default(true);
            $table->boolean("permitircomentarios")->default(true);
            $table->boolean("permitircomentariosanonimos")->default(true);
            $table->boolean("notificarnovoscomentarios")->default(true);
            $table->boolean("comentariosdevemseraprovados")->default(false);
            $table->boolean("permitircompartilhamentos")->default(true);
            $table->foreign("idblog")->references("id")->on("bg_blog");
            $table->foreign("idtipoparametro")->references("id")->on("bg_blog_tipoparametros");
            $table->foreign("idformatodata")->references("id")->on("bg_cad_formato");
            $table->foreign("idformatohora")->references("id")->on("bg_cad_formato");
            $table->foreign("idcategoriapadrao")->references("id")->on("bg_cad_categoria");
            $table->foreign("idtipovisualizacaopostsrelacionados")->references("id")->on("bg_post_tipovisualizacao");
            $table->foreign("idtipocompartilhamento")->references("id")->on("bg_post_tipocompartilhamento");
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
        Schema::dropIfExists('bg_blog_parametros');
    }
}
