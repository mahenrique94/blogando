<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaCadTipoFormato extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_cad_tipoformato")->insert([
            "id" => 1,
            "descricao" => "Data",
            "slug" => "data"
        ]);
        DB::table("bg_cad_tipoformato")->insert([
            "id" => 2,
            "descricao" => "Hora",
            "slug" => "hora"
        ]);
        DB::table("bg_cad_tipoformato")->insert([
            "id" => 3,
            "descricao" => "Data / Hora",
            "slug" => "data-hora"
        ]);
    }
}
