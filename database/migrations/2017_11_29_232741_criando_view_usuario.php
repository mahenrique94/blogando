<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoViewUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view bg_vie_usuario
                       (id, email, senha, token, remember_token, idperfil, nome, apeliado, descricao, imagem, slug, idgrupo, grupo) as
                       select usu.id, usu.email, usu.senha, usu.token, usu.remember_token, per.id as idperfil,
                         per.nome, per.apelido, per.descricao, per.imagem, per.slug, gru.id as idgrupo, gru.descricao as grupo
                       from bg_tbl_perfil per, bg_adm_usuario usu, bg_adm_grupo gru
                       where per.idusuario = usu.id
                         and per.idgrupo = gru.id
                       order by per.nome");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("drop view bg_vie_usuario");
    }
}
