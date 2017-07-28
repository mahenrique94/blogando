<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaCadFormato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_cad_formato', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("idtipoformato")->unsigned();
            $table->string("descricao", 120)->unique();
            $table->string("formato", 60);
            $table->foreign("idtipoformato")->references("id")->on("bg_cad_tipoformato");
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
        Schema::dropIfExists('bg_cad_formato');
    }
}
