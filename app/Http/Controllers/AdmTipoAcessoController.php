<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdmTipoAcesso;
use App\AdmPermissao;

class AdmTipoAcessoController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        AdmTipoAcesso::where("id", $request->id)
            ->update([
                "descricao" => $request->descricao, 
                "idpermissao" => $request->idpermissao, 
                "slug" => str_slug($request->descricao), 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmTipoAcessoController@listar")->withInput(["sucesso" => "Tipo de acesso salvo atualizada com sucesso"]);;
    }

    public function deletar($id) {
        AdmTipoAcesso::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.admTipoAcesso.formulario", ["pagina" => "administrador", "subpagina" => "tipoacesso"])->with("acesso", AdmTipoAcesso::find($id))->with("permissoes", AdmPermissao::all());
    }

    public function formulario() {
        return view("painel.admTipoAcesso.formulario", ["pagina" => "administrador", "subpagina" => "tipoacesso"])->with("acesso", new AdmTipoAcesso())->with("permissoes", AdmPermissao::all());
    }

    public function json() {
        return response()->json(AdmTipoAcesso::all());
    }
    
    public function listar(Request $request) {
        $acessos = AdmTipoAcesso::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $acessos = AdmTipoAcesso::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.admTipoAcesso.lista", ["pagina" => "administrador", "subpagina" => "tipoacesso"])->with("acessos", $acessos);
    }

    public function salvar(Request $request) {
        AdmTipoAcesso::create([
            "descricao" => $request->descricao, 
            "idpermissao" => $request->idpermissao, 
            "slug" => str_slug($request->descricao), 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmTipoAcessoController@listar")->withInput(["sucesso" => "Tipo de acesso salvo com sucesso"]);
    }
}
