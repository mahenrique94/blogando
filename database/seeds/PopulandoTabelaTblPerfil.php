<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaTblPerfil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_tbl_perfil")->insert([
            "id" => 1,
            "idgrupo" => 1,
            "idusuario" => 1,
            "nome" => "Administrador",
            "slug" => "administrador",
            "imagem" => "administrador.jpg",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
