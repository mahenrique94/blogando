<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        Blog::where("id", $request->id)
            ->update([
                "titulo" => $request->titulo, 
                "path" => $request->path, 
                "url" => $request->url, 
                "descricao" => $request->descricao, 
                "slug" => str_slug($request->titulo), 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogController@formulario")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function deletar($id) {
        
    }

    public function editar($id) {
        
    }

    public function formulario() {
        return view("painel.configuracoes.geral", ["pagina" => "configuracoes"], ["subpagina" => "geral"]);
    }

    public function json() {
        return response()->json(Blog::all());
    }
    
    public function listar(Request $request) {
        
    }

    public function salvar(Request $request) {
        
    }
}
