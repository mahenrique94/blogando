<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use App\AdmPermissao;

class AdmPermissaoController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        AdmPermissao::where("id", $request->id)
            ->update([
                "descricao" => $request->descricao, 
                "salvar" => $request->salvar, 
                "editar" => $request->editar, 
                "deletar" => $request->deletar, 
                "listar" => $request->listar, 
                "visualizar" => $request->visualizar, 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmPermissaoController@listar")->withInput(["sucesso" => "Permissão atualizada com sucesso"]);
    }

    public function deletar($id) {
        AdmPermissao::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.admPermissao.formulario", ["pagina" => "administrador", "subpagina" => "permissoes"])->with("permissao", AdmPermissao::find($id));
    }

    public function formulario() {
        return view("painel.admPermissao.formulario", ["pagina" => "administrador", "subpagina" => "permissoes"])->with("permissao", new AdmPermissao());
    }

    public function json() {
        return response()->json(AdmPermissao::all());
    }
    
    public function listar(Request $request) {
        $tags = AdmPermissao::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $tags = AdmPermissao::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.admPermissao.lista", ["pagina" => "administrador", "subpagina" => "permissoes"])->with("permissoes", $tags);
    }

    public function salvar(Request $request) {
        AdmPermissao::create([
            "descricao" => $request->descricao, 
            "salvar" => $request->salvar, 
            "editar" => $request->editar, 
            "deletar" => $request->deletar, 
            "listar" => $request->listar, 
            "visualizar" => $request->visualizar, 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmPermissaoController@listar")->withInput(["sucesso" => "Permissão salva com sucesso"]);
    }
}
