<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use App\CadCategoria;

class CadCategoriaController extends Controller implements GenericoController
{   
    public function atualizar(Request $request) {
        CadCategoria::where("id", $request->id)
            ->update([
                "descricao" => $request->descricao, 
                "slug" => str_slug($request->descricao), 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("CadCategoriaController@listar")->withInput(["sucesso" => "Categoria atualizada com sucesso"]);
    }

    public function deletar($id) {
        CadCategoria::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.cadCategoria.formulario", ["pagina" => "posts", "subpagina" => "categorias"])->with("categoria", CadCategoria::find($id));
    }

    public function formulario() {
        return view("painel.cadCategoria.formulario", ["pagina" => "posts", "subpagina" => "categorias"])->with("categoria", new CadCategoria());
    }

    public function json() {
        return response()->json(CadCategoria::all());
    }
    
    public function listar(Request $request) {
        $categorias = CadCategoria::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $categorias = CadCategoria::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.cadCategoria.lista", ["pagina" => "posts", "subpagina" => "categorias"])->with("categorias", $categorias);
    }

    public function salvar(Request $request) {
        CadCategoria::create([
            "descricao" => $request->descricao, 
            "slug" => str_slug($request->descricao), 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("CadCategoriaController@listar")->withInput(["sucesso" => "Categoria salva com sucesso"]);
    }
}
