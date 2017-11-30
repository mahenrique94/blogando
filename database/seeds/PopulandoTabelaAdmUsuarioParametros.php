<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaAdmUsuarioParametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_adm_usuarioparametros")->insert([
            "id" => 1,
            "idusuario" => 1,
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
