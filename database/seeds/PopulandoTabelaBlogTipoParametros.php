<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogTipoParametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 1,
            "descricao" => "Geral",
            "slug" => "geral"
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 2,
            "descricao" => "Escrita",
            "slug" => "escrita"
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 3,
            "descricao" => "Leitura",
            "slug" => "leitura"
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 4,
            "descricao" => "Discussão",
            "slug" => "discussao"
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 5,
            "descricao" => "Compartilhamento",
            "slug" => "compartilhamento"
        ]);
    }
}
