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
            "descricao" => "Bem vindo ao Blogando",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
    }
}
