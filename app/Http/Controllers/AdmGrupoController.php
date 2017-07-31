<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdmGrupo;
use App\AdmTipoAcesso;

class AdmGrupoController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        AdmGrupo::where("id", $request->id)
            ->update([
                "descricao" => $request->descricao, 
                "idtipoacesso" => $request->idtipoacesso, 
                "slug" => str_slug($request->descricao),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmGrupoController@listar")->withInput(["sucesso" => "Grupo atualizado com sucesso"]);
    }

    public function deletar($id) {
        AdmGrupo::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.admGrupo.formulario", ["pagina" => "administrador", "subpagina" => "grupos"])->with("grupo", AdmGrupo::find($id))->with("tiposdeacesso", AdmTipoAcesso::all());
    }

    public function formulario() {
        return view("painel.admGrupo.formulario", ["pagina" => "administrador", "subpagina" => "grupos"])->with("grupo", new AdmGrupo())->with("tiposdeacesso", AdmTipoAcesso::all());
    }

    public function json() {
        return response()->json(AdmGrupo::all());
    }
    
    public function listar(Request $request) {
        $grupos = AdmGrupo::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $grupos = AdmGrupo::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.admGrupo.lista", ["pagina" => "administrador", "subpagina" => "grupos"])->with("grupos", $grupos);
    }

    public function salvar(Request $request) {
        AdmGrupo::create([
            "descricao" => $request->descricao, 
            "idtipoacesso" => $request->idtipoacesso, 
            "slug" => str_slug($request->descricao), 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmGrupoController@listar")->withInput(["sucesso" => "Grupo salvo com sucesso"]);
    }
}
