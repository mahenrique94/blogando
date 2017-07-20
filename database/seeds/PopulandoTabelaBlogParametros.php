<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogParametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_parametros")->insert([
            "id" => 1,
            "idblog" => 1,
            "idtipoparametro" => 1,
            "idformatodata" => 1,
            "idformatohora" => 4,
            "idcategoriapadrao" => 1,
            "idtipovisualizacaopostsrelacionados" => 1,
            "idtipocompartilhamento" => 1,
            "quantidadepostsporpagina" => 10,
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
