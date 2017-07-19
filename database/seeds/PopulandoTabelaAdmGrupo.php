<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaAdmGrupo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_adm_grupo")->insert([
            "id" => 1,
            "idtipoacesso" => 1,
            "descricao" => "Administrador",
            "slug" => "administrador"
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 2,
            "idtipoacesso" => 2,
            "descricao" => "Editor",
            "slug" => "editor"
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 3,
            "idtipoacesso" => 2,
            "descricao" => "Autor",
            "slug" => "autor"
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 4,
            "idtipoacesso" => 6,
            "descricao" => "Colaborador",
            "slug" => "colaborador"
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 5,
            "idtipoacesso" => 2,
            "descricao" => "Revisor",
            "slug" => "revisor"
        ]);
    }
}
