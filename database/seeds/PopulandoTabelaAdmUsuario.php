<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaAdmUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_adm_usuario")->insert([
            "id" => 1,
            "email" => "administrador@blog.com.br",
            "senha" => encrypt("12345678"),
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
