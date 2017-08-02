<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogAparencia;
use App\BlogTema;

class BlogAparenciaController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        BlogAparencia::where("id", $request->id)
            ->update([
                "temablog" => $request->temablog, 
                "idtemamenu" => $request->idtemamenu, 
                "idtemaaside" => $request->idtemaaside, 
                "idtemaperfil" => $request->idtemaperfil, 
                "idtemanavegacao" => $request->idtemanavegacao,
                "mostrarredessociais" => $request->mostrarredessociais,
                "mostrarpostsrecentes" => $request->mostrarpostsrecentes,
                "mostrarcategorias" => $request->mostrarcategorias,
                "mostrartags" => $request->mostrartags,
                "mostrararquivos" => $request->mostrararquivos,
                "mostrarnewsletter" => $request->mostrarnewsletter,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogAparenciaController@formulario")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function deletar($id) {
        
    }

    public function editar($id) {
        
    }

    public function formulario() {
        return view("painel.configuracoes.aparencia", ["pagina" => "configuracoes"], ["subpagina" => "aparencia"])->with("temas", BlogTema::all());
    }

    public function json() {
        return response()->json(BlogAparencia::all());
    }
    
    public function listar(Request $request) {
        
    }

    public function salvar(Request $request) {
        
    }
}
