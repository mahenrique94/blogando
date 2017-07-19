<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaAdmTipoacesso extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 1,
            "idpermissao" => 1,
            "descricao" => "Máximo",
            "slug" => "maximo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 2,
            "idpermissao" => 2,
            "descricao" => "Semi máximo",
            "slug" => "semi-maximo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 3,
            "idpermissao" => 3,
            "descricao" => "Médio",
            "slug" => "medio",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 4,
            "idpermissao" => 4,
            "descricao" => "Semi médio",
            "slug" => "semi-medio",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 5,
            "idpermissao" => 5,
            "descricao" => "Mínimo",
            "slug" => "minimo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_adm_tipoacesso")->insert([
            "id" => 6,
            "idpermissao" => 6,
            "descricao" => "Semi mínimo",
            "slug" => "semi-minimo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
