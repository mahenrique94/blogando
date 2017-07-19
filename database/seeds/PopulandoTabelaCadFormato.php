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
            "formato" => "dd/MM/yyyy",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 2,
            "idtipoformato" => 1,
            "formato" => "yyyy/MM/dd",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 3,
            "idtipoformato" => 1,
            "formato" => "MM/dd/yyyy",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 4,
            "idtipoformato" => 2,
            "formato" => "HH:mm",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 5,
            "idtipoformato" => 3,
            "formato" => "dd/MM/yyyy HH:mm",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 6,
            "idtipoformato" => 3,
            "formato" => "yyyy/MM/dd HH:mm",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_formato")->insert([
            "id" => 7,
            "idtipoformato" => 3,
            "formato" => "MM/dd/yyyy HH:mm",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
