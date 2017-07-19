<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaCadCategoria extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_cad_categoria")->insert([
            "id" => 1,
            "descricao" => "Sem categoria",
            "slug" => "sem-categoria"
        ]);
    }
}
