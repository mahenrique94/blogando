<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategoria;
use DB;

class PostCategoriaController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        
    }

    public function deletar($id) {
        PostCategoria::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        
    }

    public function formulario() {
        
    }

    public function json() {
        return response()->json(PostCategoria::all());
    }
    
    public function listar(Request $request) {
        
    }

    public function salvar(Request $request) {
        PostCategoria::create([
            "idpost" => $request->id,
            "idcategoria" => $request->categorias,
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $id = DB::table("bg_post_categoria")->latest("id")->first();
        return response()->json($id);
    }
}
