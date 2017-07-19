<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlog extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog")->insert([
            "id" => 1,
            "titulo" => "Titulo do Blog",
            "descricao" => "Descrição do meu blog",
            "slug" => "titulo-do-blog",
            "url" => "http://titulodoblog.com.br"
        ]);
    }
}
