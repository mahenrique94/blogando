<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPostTipocompartilhamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_post_tipocompartilhamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string("descricao", 10)->unique();
            $table->boolean("permitircompartilharblog")->default(true);
            $table->boolean("permitircompartilharposts")->default(true);
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
        Schema::dropIfExists('bg_post_tipocompartilhamento');
    }
}
