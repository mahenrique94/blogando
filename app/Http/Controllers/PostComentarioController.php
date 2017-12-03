<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use App\PostComentario;
use App\Post;

class PostComentarioController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        PostComentario::where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "email" => $request->email,
                "comentario" => $request->comentario,
                "aprovado" => $request->aprovado,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostComentarioController@listar")->withInput(["sucesso" => "Comentário atualizado com sucesso"]);
    }

    public function deletar($id) {
        PostComentario::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.postComentario.formulario", ["pagina" => "comentarios", "subpagina" => "formulario"])->with("comentario", PostComentario::find($id));
    }

    public function formulario() {

    }

    public function json() {
        return response()->json(PostComentario::all());
    }

    public function listar(Request $request) {
        $comentarios = PostComentario::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $comentarios = PostComentario::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.postComentario.lista", ["pagina" => "comentarios", "subpagina" => "todos"])->with("comentarios", $comentarios);
    }

    public function salvar(Request $request) {

    }
}
