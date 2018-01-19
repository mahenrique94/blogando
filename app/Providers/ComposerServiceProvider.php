<?php

namespace App\Providers;

use App\AdmUsuario;
use App\Http\Parametros;
use App\TblPerfil;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Blog;
use App\BlogNotificacao;
use App\BlogNotificacaoUsuario;
use App\BlogRedeSocial;
use App\CadCategoria;
use App\CadTag;
use App\Post;
use App\PostComentario;

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
            $arquivos = DB::table("bg_post")
                ->select(DB::raw("extract(year from datapostagem) as ano, extract(month from datapostagem) as mes"))
                ->groupBy(DB::raw("1, 2"))
                ->get();

            $blog = Blog::first();

            if (!Auth::guest()) {
                $user = Auth::user();
                $view->with("notificacoesnaolidas", $this->buscarNotificacoesNaoLidas());
            } else {
                $view->with("notificacoesnaolidas", BlogNotificacao::all()->first());
            }

            if (!Auth::guest())
                $view->with("usuarioLogado", AdmUsuario::find(Auth::user()->idusuario));
            $view->with("blog", $blog);
            $view->with("notificacoes", $this->buscarNotificacoesLidas());
            $view->with("categorias", CadCategoria::orderBy("descricao")->get());
            $view->with("tags", CadTag::orderBy("descricao")->get());            
            $view->with("postsdestaque", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->take(3)->get());
            $view->with("postsrecentes", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->where("idsituacao", Parametros::SITUACAOPOST_PUBLICADO)->orderBy("datapostagem", "desc")->take(5)->get());
            $view->with("blogredessociais", BlogRedeSocial::all());
            $view->with("arquivos", $arquivos);
            $view->with("postcomentarios", PostComentario::where("aprovado", true)->get());
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
                ->from("bg_blog_notificacaousuario")
                ->whereRaw("idnotificacao = bg_blog_notificacao.id")
                ->where("idperfil", Auth::id());
        })->orderBy("id", "desc")->get();
    }

    private function buscarNotificacoesLidas() {
        return BlogNotificacao::whereExists(function($query) {
            $query->select(DB::raw(1))
                ->from("bg_blog_notificacaousuario")
                ->whereRaw("idnotificacao = bg_blog_notificacao.id")
                ->where("idperfil", Auth::id());
        })->orderBy("id", "desc")->get();
    }
}
