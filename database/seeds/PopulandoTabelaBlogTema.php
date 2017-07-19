<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogTema extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_tema")->insert([
            "id" => 1,
            "tema" => "Padrao",
            "slug" => "padrao",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tema")->insert([
            "id" => 2,
            "tema" => "Claro",
            "slug" => "claro",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tema")->insert([
            "id" => 3,
            "tema" => "Azulado",
            "slug" => "azulado",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_blog_tema")->insert([
            "id" => 4,
            "tema" => "Verdeado",
            "slug" => "verdeado",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
