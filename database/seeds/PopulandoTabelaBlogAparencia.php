<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogAparencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_aparencia")->insert([
            "id" => 1,
            "idblog" => 1,
            "idtemamenu" => 1,
            "idtemaaside" => 1,
            "idtemaperfil" => 1,
            "idtemanavegacao" => 1,
        ]);
    }
}
