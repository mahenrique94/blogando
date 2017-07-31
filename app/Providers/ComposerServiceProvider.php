<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Blog;
use App\BlogNotificacao;
use App\BlogNotificacaoAutor;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer("painel.configuracoes.aparencia", "App\Http\ViewComposers\AparenciaComposer");
        View::composer([
            "painel.configuracoes.escrita", 
            "painel.configuracoes.leitura", 
            "painel.configuracoes.compartilhamento",
            "painel.configuracoes.discussao",
        ], "App\Http\ViewComposers\ParametrosComposer");

        View::composer("*", function ($view) {
            if (!Auth::guest()) {
                $user = Auth::user();
                $view->with("blog", Blog::find($user->idblog))
                    ->with("notificacoesnaolidas", $this->buscarNotificacoesNaoLidas());
            } else {
                $view->with("blog", Blog::all()->first())
                    ->with("notificacoesnaolidas", BlogNotificacao::all()->first());
            }            
            $view->with("notificacoes", $this->buscarNotificacoesLidas());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function buscarNotificacoesNaoLidas() {
        return BlogNotificacao::whereNotExists(function($query) {
            $query->select(DB::raw(1))
                ->from("bg_blog_notificacaoautor")
                ->whereRaw("idnotificacao = bg_blog_notificacao.id")
                ->where("idautor", Auth::id());
        })->orderBy("id", "desc")->get();
    }

    private function buscarNotificacoesLidas() {
        return BlogNotificacao::whereExists(function($query) {
            $query->select(DB::raw(1))
                ->from("bg_blog_notificacaoautor")
                ->whereRaw("idnotificacao = bg_blog_notificacao.id")
                ->where("idautor", Auth::id());
        })->orderBy("id", "desc")->get();
    }
}
