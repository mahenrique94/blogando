<?php

namespace App\Http\Controllers;

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
        return redirect()->action("CadCategoriaController@listar")->withInput(["sucesso" => "Categoria atualizada com sucesso"]);;
    }

    public function deletar($id) {
        CadCategoria::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.cadcategoria.formulario", ["pagina" => "posts", "subpagina" => "categorias"])->with("categoria", CadCategoria::find($id));
    }

    public function formulario() {
        return view("painel.cadcategoria.formulario", ["pagina" => "posts", "subpagina" => "categorias"])->with("categoria", new CadCategoria());
    }

    public function json() {
        return response()->json(CadCategoria::all());
    }
    
    public function listar(Request $request) {
        $categorias = CadCategoria::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $categorias = CadCategoria::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.cadcategoria.lista", ["pagina" => "posts", "subpagina" => "categorias"])->with("categorias", $categorias);
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
