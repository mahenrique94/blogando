<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostTipoCompartilhamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_tipocompartilhamento")->insert([
            "id" => 1,
            "descricao" => "Compartilhar tudo",
        ]);
        DB::table("bg_post_tipocompartilhamento")->insert([
            "id" => 2,
            "descricao" => "Compartilhar somente o blog",
            "permitircompartilharposts" => false
        ]);
        DB::table("bg_post_tipocompartilhamento")->insert([
            "id" => 3,
            "descricao" => "Compartilhar somente os posts",
            "permitircompartilharblog" => false
        ]);
    }
}
