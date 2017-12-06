<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostTipoEstatistica extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_tipoestatistica")->insert([
            "id" => 1,
            "descricao" => "Curtida",
            "slug" => "Curtida",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp')
        ]);
        DB::table("bg_post_tipoestatistica")->insert([
            "id" => 2,
            "descricao" => "Compartilhamento",
            "slug" => "compartilhamento",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp')
        ]);
        DB::table("bg_post_tipoestatistica")->insert([
            "id" => 3,
            "descricao" => "Visualização",
            "slug" => "visualizacao",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp')
        ]);
        DB::table("bg_post_tipoestatistica")->insert([
            "id" => 4,
            "descricao" => "Favorito",
            "slug" => "Favorito",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp')
        ]);
    }
}
