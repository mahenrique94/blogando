<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogTipoNotificacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_tiponotificacao")->insert([
            "id" => 1,
            "descricao" => "Sistema",
            "slug" => "sistema",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
        DB::table("bg_blog_tiponotificacao")->insert([
            "id" => 2,
            "descricao" => "Usuário",
            "slug" => "usuario",
            "created_at" => DB::raw("current_timestamp"),
            "updated_at" => DB::raw("current_timestamp"),
        ]);
    }
}
