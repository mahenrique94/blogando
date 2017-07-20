<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogTipoMidia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_tipomidia")->insert([
            "id" => 1,
            "descricao" => "Imagem",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
        DB::table("bg_blog_tipomidia")->insert([
            "id" => 2,
            "descricao" => "Vídeo",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
    }
}
