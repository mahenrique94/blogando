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
            "slug" => "administrador",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 2,
            "idtipoacesso" => 2,
            "descricao" => "Editor",
            "slug" => "editor",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 3,
            "idtipoacesso" => 2,
            "descricao" => "Autor",
            "slug" => "autor",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 4,
            "idtipoacesso" => 6,
            "descricao" => "Colaborador",
            "slug" => "colaborador",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 5,
            "idtipoacesso" => 2,
            "descricao" => "Revisor",
            "slug" => "revisor",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 6,
            "idtipoacesso" => 3,
            "descricao" => "Escritor",
            "slug" => "escritor",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_grupo")->insert([
            "id" => 7,
            "idtipoacesso" => 5,
            "descricao" => "Leitor",
            "slug" => "leitor",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
