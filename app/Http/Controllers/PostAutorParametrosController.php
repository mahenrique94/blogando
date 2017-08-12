<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostAutorParametros;

class PostAutorParametrosController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        $parametros = PostAutorParametros::where("id", $request->id)
            ->update([
                "revisarconteudoprimeiravez" => $request->revisarconteudoprimeiravez,
                "revisarconteudoatualizado" => $request->revisarconteudoatualizado,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostAutorParametrosController@editar", ["id" => $parametros])->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function criarNovo($idAutor) {
        $estatistica = PostAutorParametros::create([
            "idautor" => $idAutor,
            "revisarconteudoprimeiravez" => 0,
            "revisarconteudoatualizado" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("PostAutorController@editar", ["id" => $idAutor])->withInput(["sucesso" => "Autor salvo com sucesso"]);
    }

    public function deletar($id) {

    }

    public function editar($id) {
        return view("painel.postAutorParametros.formulario", ["pagina" => "usuarios", "subpagina" => "configuracoes"])->with("parametros", PostAutorParametros::find($id));
    }

    public function formulario() {

    }

    public function json() {
        return response()->json(PostAutorParametros::all());
    }

    public function listar(Request $request) {

    }

    public function salvar(Request $request) {

    }
}
