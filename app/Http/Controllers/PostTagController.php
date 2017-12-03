<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use DB;
use App\PostTag;

class PostTagController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        
    }

    public function deletar($id) {
        PostTag::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        
    }

    public function formulario() {
        
    }

    public function json() {
        return response()->json(PostTag::all());
    }
    
    public function listar(Request $request) {
        
    }

    public function salvar(Request $request) {
        PostTag::create([
            "idpost" => $request->id,
            "idtag" => $request->tags,
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $id = DB::table("bg_post_tag")->latest("id")->first();
        return response()->json($id);
    }
}
