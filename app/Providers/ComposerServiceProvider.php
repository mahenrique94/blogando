<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Blog;

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
                $view->with("blog", Blog::find($user->idblog));
            } else {
                $view->with("blog", Blog::all()->first());
            }            
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
