<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdmUsuarioParametros;

class AdmUsuarioParametrosController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        $parametros = AdmUsuarioParametros::where("id", $request->id)
            ->update([
                "revisarconteudoprimeiravez" => $request->revisarconteudoprimeiravez,
                "revisarconteudoatualizado" => $request->revisarconteudoatualizado,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmUsuarioParametrosController@editar", ["id" => $parametros])->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function criarNovo($idUsuario) {
        AdmUsuarioParametros::create([
            "idusuario" => $idUsuario->id,
            "revisarconteudoprimeiravez" => 0,
            "revisarconteudoatualizado" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmUsuarioController@editar", ["id" => $idUsuario->id])->withInput(["sucesso" => "Configurações criadas com sucesso"]);
    }

    public function deletar($id) {

    }

    public function editar($id) {
        return view("painel.admUsuarioParametros.formulario", ["pagina" => "usuarios", "subpagina" => "configuracoes"])->with("parametros", AdmUsuarioParametros::find($id));
    }

    public function formulario() {

    }

    public function json() {
        return response()->json(AdmUsuarioParametros::all());
    }

    public function listar(Request $request) {

    }

    public function salvar(Request $request) {

    }
}
