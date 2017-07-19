<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaPostAutorParametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_post_autorparametros")->insert([
            "id" => 1,
            "idautor" => 1
        ]);
    }
}
