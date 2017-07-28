<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Blog;
use App\BlogNotificacao;

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
                    ->with("notificacoesnaolidas", BlogNotificacao::where("id", ">", 0));
            } else {
                $view->with("blog", Blog::all()->first())
                    ->with("notificacoesnaolidas", BlogNotificacao::lastest());
            }            
            $view->with("notificacoes", BlogNotificacao::where("id", ">", 0)->get());
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
}
