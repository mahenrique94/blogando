<?php

use Illuminate\Database\Seeder;

class PopulandoTabelaBlogNewsletterparametros extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bg_blog_newsletterparametros")->insert([
            "id" => 1,
            "textoacompanharposts" => "Olá, obrigado por acompanhar nosso blog, a partir de agora você será notificado via email assim que um novo post for publicado em nosso blog.",
            "textoacompanharcomentarios" => "Olá, obrigado por fazer parte do nosso blog, a partir de agora você será notificado via email assim que um novo comentário for realizado em algum post do nosso blog.",
            "textoacompanharrespostas" => "Olá, obrigado por fazer parte do nosso blog, a partir de agora você será notificado via email assim que uma nova resposta for realizada em um comentário de algum post em nosso blog.",
            "textoacompanharnewsletter" => "Olá, obrigado por fazer parte do nosso blog, a partir de agora você será notificado via email assim que novos posts forem publicados.",
            "created_at" => DB::raw('current_timestamp'),
            "updated_at" => DB::raw('current_timestamp'),
        ]);
    }
}
