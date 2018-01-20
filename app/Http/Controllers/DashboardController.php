<?php

namespace App\Http\Controllers;

use App\Http\Parametros;
use App\PostEstatisticas;
use App\TblPerfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostComentario;

class DashboardController extends Controller
{

    private $admUsuarioController;
    private $tblPerfilController;

    public function __construct(AdmUsuarioController $admUsuarioController, TblPerfilController $tblPerfilController) {
        $this->admUsuarioController = $admUsuarioController;
        $this->tblPerfilController = $tblPerfilController;
    }

    public function index() {
        return view("painel.dashboard.index", ["pagina" => "dashboard"], ["subpagina" => "inicio"]);
    }

    public function meuPerfil() {
        return view("painel.dashboard.meuperfil", ["pagina" => "dashboard"], ["subpagina" => "meuperfil"])->with("perfil", TblPerfil::find(Auth::id()));
    }

    public function meuPerfilSalvar(Request $request) {
        $this->admUsuarioController->atualizarDados($request->idusuario, $request);
        $this->tblPerfilController->atualizarDados($request->id, $request);
        return redirect()->action("DashboardController@meuPerfil")->withInput(["sucesso" => "Perfil atualizado com sucesso"]);;
    }

    public function meusAgendamentos(Request $request) {
        $posts = Post::where("idperfil", Auth::id())->where("idsituacao", Parametros::SITUACAOPOST_AGENDADO)->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->where("idsituacao", Parametros::SITUACAOPOST_AGENDADOS)->get();
        }
        return view("painel.dashboard.meusagendamentos", ["pagina" => "dashboard"], ["subpagina" => "meusagendamentos"])->with("posts", $posts);
    }

    public function meusComentarios(Request $request) {
        $comentarios = PostComentario::where("idperfil", Auth::id())->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $comentarios = PostComentario::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->get();
        }
        return view("painel.dashboard.meuscomentarios", ["pagina" => "dashboard"], ["subpagina" => "meuscomentarios"])->with("comentarios", $comentarios);
    }

    public function meusPosts(Request $request) {
        $posts = Post::where("idperfil", Auth::id())->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->get();
        }
        return view("painel.dashboard.meusposts", ["pagina" => "dashboard"], ["subpagina" => "meusposts"])->with("posts", $posts);
    }

    public function meusPostsCurtidos() {
        $estatisticas = PostEstatisticas::where("idtipoestatistica", Parametros::TIPOESTATISTICA_CURTIDA)
            ->where("idperfil", Auth::id())
            ->get();
        return view("painel.dashboard.meuspostscurtidos", ["pagina" => "dashboard"], ["subpagina" => "meuspostscurtidos"])->with("estatisticas", $estatisticas);
    }

    public function meusPostsFavoritos() {
        $estatisticas = PostEstatisticas::where("idtipoestatistica", Parametros::TIPOESTATISTICA_FAVORITO)
            ->where("idperfil", Auth::id())
            ->get();
        return view("painel.dashboard.meuspostsfavoritos", ["pagina" => "dashboard"], ["subpagina" => "meuspostsfavoritos"])->with("estatisticas", $estatisticas);}

    public function meusRascunhos(Request $request) {
        $posts = Post::where("idperfil", Auth::id())->where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->get();
        }
        return view("painel.dashboard.meusrascunhos", ["pagina" => "dashboard"], ["subpagina" => "meusrascunhos"])->with("posts", $posts);
    }
}
