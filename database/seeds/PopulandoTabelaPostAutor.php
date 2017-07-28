<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostAutor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_autor")->insert([
            "id" => 1,
            "idblog" => 1,
            "idgrupo" => 1,
            "nome" => "Administrador",
            "slug" => "administrador",
            "imagem" => "administrador.jpg",
            "email" => "administrador@blog.com.br",
            "senha" => "12345678",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
