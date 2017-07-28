<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaCadFormato extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_cad_formato")->insert([
            "id" => 1,
            "idtipoformato" => 1,
            "descricao" => "01/01/2017",
            "formato" => "d/m/Y",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 2,
            "idtipoformato" => 1,
            "descricao" => "01/01/17",
            "formato" => "d/m/y",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 3,
            "idtipoformato" => 1,
            "descricao" => "01 de Janeiro de 2017",
            "formato" => "d \\d\\e F \\d\\e Y",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 4,
            "idtipoformato" => 2,
            "descricao" => "10:00",
            "formato" => "H:i",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 5,
            "idtipoformato" => 2,
            "descricao" => "10:00 AM/PM",
            "formato" => "h:i",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 6,
            "idtipoformato" => 3,
            "descricao" => "01/01/2017 10:00",
            "formato" => "d/m/Y H:i",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 7,
            "idtipoformato" => 3,
            "descricao" => "01/01/17 10:00",
            "formato" => "d/m/y H:i",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 8,
            "idtipoformato" => 3,
            "descricao" => "01 de Janeiro de 2017 ás 10:00",
            "formato" => "d \\d\\e F \\d\\e Y \\á\\s H:i",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
