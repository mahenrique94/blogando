<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostTipoVisualizacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 1,
            "descricao" => "Visualização completa",
        ]);
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 2,
            "descricao" => "Visualização completa sem legenda",
            "mostrarlegendarelacionado" => false
        ]);
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 3,
            "descricao" => "Visualização completa sem legenda e imagem",
            "mostrarlegendarelacionado" => false,
            "mostrarimagem" => false
        ]);
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 4,
            "descricao" => "Visualização completa sem imagem",
            "mostrarimagem" => false
        ]);
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 5,
            "descricao" => "Visualização completa sem categoria",
            "mostrarcategoria" => false
        ]);
        DB::table("bg_post_tipovisualizacao")->insert([
            "id" => 6,
            "descricao" => "Visualização completa sem data",
            "mostrardatapostagem" => false
        ]);
    }
}
