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
            "slug" => "publicado"
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 2,
            "descricao" => "Pendente",
            "slug" => "pendente"
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 3,
            "descricao" => "Agendada",
            "slug" => "agendada"
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 4,
            "descricao" => "Aguardando revisão",
            "slug" => "aguardando-revisao"
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 5,
            "descricao" => "Em revisão",
            "slug" => "em-revisao"
        ]);
        DB::table("bg_post_situacao")->insert([
            "id" => 6,
            "descricao" => "Em andamento",
            "slug" => "Em-andamento"
        ]);
    }
}
