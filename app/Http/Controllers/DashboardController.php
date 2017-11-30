<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\PostComentario;

class DashboardController extends Controller
{
    public function index() {
        return view("painel.dashboard.index", ["pagina" => "dashboard"], ["subpagina" => "inicio"]);
    }

    public function meuscomentarios(Request $request) {
        $comentarios = PostComentario::where("idperfil", Auth::id())->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $comentarios = PostComentario::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->get();
        }
        return view("painel.dashboard.meuscomentarios", ["pagina" => "dashboard"], ["subpagina" => "meuscomentarios"])->with("comentarios", $comentarios);
    }

    public function meusposts(Request $request) {
        $posts = Post::where("idperfil", Auth::id())->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->get();
        }
        return view("painel.dashboard.meusposts", ["pagina" => "dashboard"], ["subpagina" => "meusposts"])->with("posts", $posts);
    }

    public function meusrascunhos(Request $request) {
        $posts = Post::where("idperfil", Auth::id())->where("idsituacao", 8)->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->campo, "like", $request->filtro)->where("idperfil", Auth::id())->where("idsituacao", 8)->get();
        }
        return view("painel.dashboard.meusrascunhos", ["pagina" => "dashboard"], ["subpagina" => "meusrascunhos"])->with("posts", $posts);
    }
}
