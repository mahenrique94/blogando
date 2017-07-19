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
            "slug" => "facebook"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 2,
            "descricao" => "Github",
            "icone" => "icon-github-squared",
            "slug" => "github"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 3,
            "descricao" => "Google Plus",
            "icone" => "icon-gplus-squared",
            "slug" => "google-plus"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 4,
            "descricao" => "Linkedin",
            "icone" => "icon-linkedin-squared",
            "slug" => "linkedin"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 5,
            "descricao" => "Twitter",
            "icone" => "icon-twitter-squared",
            "slug" => "twitter"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 6,
            "descricao" => "Snapchat",
            "icone" => "icon-",
            "slug" => "snapchat"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 7,
            "descricao" => "Instagram",
            "icone" => "icon-instagram",
            "slug" => "instagram"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 8,
            "descricao" => "Skype",
            "icone" => "icon-skype",
            "slug" => "skype"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 9,
            "descricao" => "Telegram",
            "icone" => "icon-",
            "slug" => "telegram"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 10,
            "descricao" => "Whatsapp",
            "icone" => "icon-whatsapp",
            "slug" => "whatsapp"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 11,
            "descricao" => "Pinterest",
            "icone" => "icon-pinterest-squared",
            "slug" => "pinterest"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 12,
            "descricao" => "Bitbucket",
            "icone" => "icon-bitbucket-squared",
            "slug" => "bitbucket"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 13,
            "descricao" => "Dropbox",
            "icone" => "icon-dropbox",
            "slug" => "dropbox"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 14,
            "descricao" => "Slack",
            "icone" => "icon-slack",
            "slug" => "slack"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 15,
            "descricao" => "Trello",
            "icone" => "icon-trello",
            "slug" => "trello"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 16,
            "descricao" => "Tumblr",
            "icone" => "icon-tumblr",
            "slug" => "tumblr"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 17,
            "descricao" => "Steam",
            "icone" => "icon-steam-squared",
            "slug" => "steam"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 18,
            "descricao" => "Youtube",
            "icone" => "icon-youtube-squared",
            "slug" => "youtube"
        ]);
        DB::table("bg_cad_redesocial")->insert([
            "id" => 19,
            "descricao" => "Vimeo",
            "icone" => "icon-vimeo-squared",
            "slug" => "vimeo"
        ]);
    }
}
