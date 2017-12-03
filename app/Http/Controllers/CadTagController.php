<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use App\CadTag;

class CadTagController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        CadTag::where("id", $request->id)
            ->update([
                "descricao" => $request->descricao, 
                "slug" => str_slug($request->descricao), 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("CadTagController@listar")->withInput(["sucesso" => "Tag atualizada com sucesso"]);
    }

    public function deletar($id) {
        CadTag::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.cadTag.formulario", ["pagina" => "posts", "subpagina" => "tags"])->with("tag", CadTag::find($id));
    }

    public function formulario() {
        return view("painel.cadTag.formulario", ["pagina" => "posts", "subpagina" => "tags"])->with("tag", new CadTag());
    }

    public function json() {
        return response()->json(CadTag::all());
    }
    
    public function listar(Request $request) {
        $tags = CadTag::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $tags = CadTag::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.cadTag.lista", ["pagina" => "posts", "subpagina" => "tags"])->with("tags", $tags);
    }

    public function salvar(Request $request) {
        CadTag::create([
            "descricao" => $request->descricao, 
            "slug" => str_slug($request->descricao), 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("CadTagController@listar")->withInput(["sucesso" => "Tag salva com sucesso"]);
    }
}
