<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostSituacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_situacao")->insert([
            "id" => 1,
            "descricao" => "Publicado",
            "slug" => "publicado",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 2,
            "descricao" => "Pendente",
            "slug" => "pendente",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 3,
            "descricao" => "Agendado",
            "slug" => "agendada",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 4,
            "descricao" => "Aguardando revisão",
            "slug" => "aguardando-revisao",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 5,
            "descricao" => "Em revisão",
            "slug" => "em-revisao",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 6,
            "descricao" => "Em andamento",
            "slug" => "Em-andamento",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 7,
            "descricao" => "Inativo",
            "slug" => "inativo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 8,
            "descricao" => "Rascunho",
            "slug" => "rascunho",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
