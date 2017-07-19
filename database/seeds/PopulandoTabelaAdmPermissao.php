<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaAdmPermissao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_adm_permissao")->insert([
            "id" => 1,
            "descricao" => "Máxima",
            "salvar" => true,
            "editar" => true,
            "listar" => true,
            "deletar" => true,
            "visualizar" => true
        ]);
        DB::table("bg_adm_permissao")->insert([
            "id" => 2,
            "descricao" => "Semi máxima",
            "salvar" => true,
            "editar" => true,
            "listar" => true,
            "deletar" => false,
            "visualizar" => true
        ]);
        DB::table("bg_adm_permissao")->insert([
            "id" => 3,
            "descricao" => "Média",
            "salvar" => true,
            "editar" => false,
            "listar" => true,
            "deletar" => false,
            "visualizar" => true
        ]);
        DB::table("bg_adm_permissao")->insert([
            "id" => 4,
            "descricao" => "Semi média",
            "salvar" => true,
            "editar" => false,
            "listar" => true,
            "deletar" => false,
            "visualizar" => false
        ]);
        DB::table("bg_adm_permissao")->insert([
            "id" => 5,
            "descricao" => "Mínima",
            "salvar" => false,
            "editar" => false,
            "listar" => false,
            "deletar" => false,
            "visualizar" => true
        ]);
        DB::table("bg_adm_permissao")->insert([
            "id" => 6,
            "descricao" => "Semi mínima",
            "salvar" => false,
            "editar" => false,
            "listar" => true,
            "deletar" => false,
            "visualizar" => true
        ]);
    }
}
