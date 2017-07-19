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
            "slug" => "geral",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 2,
            "descricao" => "Escrita",
            "slug" => "escrita",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 3,
            "descricao" => "Leitura",
            "slug" => "leitura",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 4,
            "descricao" => "Discussão",
            "slug" => "discussao",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tipoparametros")->insert([
            "id" => 5,
            "descricao" => "Compartilhamento",
            "slug" => "compartilhamento",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
