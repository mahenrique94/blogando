<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogNewsletterParametros;

class BlogNewsletterParametrosController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        BlogNewsletterParametros::where("id", $request->id)
            ->update([
                "textoacompanharposts" => $request->textoacompanharposts,
                "textoacompanharcomentarios" => $request->textoacompanharcomentarios,
                "textoacompanharrespostas" => $request->textoacompanharrespostas,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogNewsletterParametrosController@formulario")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function deletar($id) {
        
    }

    public function editar($id) {
        
    }

    public function formulario() {
        return view("painel.configuracoes.newsletter", ["pagina" => "configuracoes"], ["subpagina" => "newsletter"])->with("newsletterparametros", BlogNewsletterParametros::first());
    }

    public function json() {
        return response()->json(BlogNewsletterParametros::all());
    }
    
    public function listar(Request $request) {
        
    }

    public function salvar(Request $request) {
        
    }
}
