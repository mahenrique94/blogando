<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaCadRedeSocial extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_cad_redesocial")->insert([
            "id" => 1,
            "descricao" => "Facebook",
            "icone" => "icon-facebook-squared",
            "slug" => "facebook",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 2,
            "descricao" => "Github",
            "icone" => "icon-github-squared",
            "slug" => "github",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 3,
            "descricao" => "Google Plus",
            "icone" => "icon-gplus-squared",
            "slug" => "google-plus",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 4,
            "descricao" => "Linkedin",
            "icone" => "icon-linkedin-squared",
            "slug" => "linkedin",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 5,
            "descricao" => "Twitter",
            "icone" => "icon-twitter-squared",
            "slug" => "twitter",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 6,
            "descricao" => "Snapchat",
            "icone" => "icon-",
            "slug" => "snapchat",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 7,
            "descricao" => "Instagram",
            "icone" => "icon-instagram",
            "slug" => "instagram",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 8,
            "descricao" => "Skype",
            "icone" => "icon-skype",
            "slug" => "skype",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 9,
            "descricao" => "Telegram",
            "icone" => "icon-",
            "slug" => "telegram",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 10,
            "descricao" => "Whatsapp",
            "icone" => "icon-whatsapp",
            "slug" => "whatsapp",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 11,
            "descricao" => "Pinterest",
            "icone" => "icon-pinterest-squared",
            "slug" => "pinterest",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 12,
            "descricao" => "Bitbucket",
            "icone" => "icon-bitbucket-squared",
            "slug" => "bitbucket",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 13,
            "descricao" => "Dropbox",
            "icone" => "icon-dropbox",
            "slug" => "dropbox",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 14,
            "descricao" => "Slack",
            "icone" => "icon-slack",
            "slug" => "slack",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 15,
            "descricao" => "Trello",
            "icone" => "icon-trello",
            "slug" => "trello",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 16,
            "descricao" => "Tumblr",
            "icone" => "icon-tumblr",
            "slug" => "tumblr",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 17,
            "descricao" => "Steam",
            "icone" => "icon-steam-squared",
            "slug" => "steam",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 18,
            "descricao" => "Youtube",
            "icone" => "icon-youtube-squared",
            "slug" => "youtube",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 19,
            "descricao" => "Vimeo",
            "icone" => "icon-vimeo-squared",
            "slug" => "vimeo",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
