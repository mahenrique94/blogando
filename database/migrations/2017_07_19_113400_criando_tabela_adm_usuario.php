<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAdmUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bg_adm_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string("email", 255)->unique();
            $table->string("senha", 255);
            $table->string("token", 255)->nullable()->unique();
            $table->string("remember_token", 255)->nullable()->unique();
            $table->boolean("inativo")->default(false);
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
        Schema::dropIfExists('bg_adm_usuario');
    }
}
