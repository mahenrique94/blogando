<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogNotificacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_notificacao")->insert([
            "id" => 1,
            "idtiponotificacao" => 1,
            "nome" => "Blogando",
            "titulo" => "",
            "descricao" => "",
            "imagem" => "",
            "link" => "#",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
        DB::table("bg_blog_notificacao")->insert([
            "id" => 2,
            "idtiponotificacao" => 1,
            "nome" => "Blogando",
            "titulo" => "Boas vindas",
            "descricao" => "Bem vindo ao Blogando",
            "imagem" => "blogando.svg",
            "link" => "#",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
    }
}
