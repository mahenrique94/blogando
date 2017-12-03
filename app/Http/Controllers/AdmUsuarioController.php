<?php

namespace App\Http\Controllers;

use App\AdmUsuario;
use Illuminate\Http\Request;

class AdmUsuarioController extends Controller implements GenericoController
{

    private $usuariosParametrosController;

    public function __construct(AdmUsuarioParametrosController $usuariosParametrosController) {
        $this->usuariosParametrosController = $usuariosParametrosController;
    }

    public function atualizar(Request $request) {
        $usuario = AdmUsuario::where("id", $request->id)
            ->update([
                "email" => $request->email,
                "senha" => $request->senha,
                "inativo" => $request->inativo,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmUsuarioController@editar", ["id" => $request->id])->withInput(["sucesso" => "Usuário atualizado com sucesso"]);
    }

    public function deletar($id) {
        AdmUsuario::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.admUsuario.formulario", ["pagina" => "usuarios", "subpagina" => "novousuario"])->with("usuario", AdmUsuario::find($id));
    }

    public function formulario() {
        return view("painel.admUsuario.formulario", ["pagina" => "usuarios", "subpagina" => "novousuario"])->with("usuario", new AdmUsuario());
    }

    public function json() {}

    public function listar(Request $request) {
        $usuarios = AdmUsuario::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $usuarios = AdmUsuario::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.admUsuario.lista", ["pagina" => "usuarios", "subpagina" => "todosusuarios"])->with("usuarios", $usuarios);
    }

    public function salvar(Request $request) {
        $usuario = AdmUsuario::create([
            "email" => $request->email,
            "senha" => $request->senha,
            "inativo" => $request->inativo,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $this->usuariosParametrosController->criarNovo($usuario);
        return redirect()->action("AdmUsuarioController@editar", ["id" => $usuario])->withInput(["sucesso" => "Usuário salvo com sucesso"]);
    }
}