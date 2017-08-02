<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogRedeSocial;
use App\CadRedeSocial;

class BlogRedeSocialController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        BlogRedeSocial::where("id", $request->id)
            ->update([
                "idredesocial" => $request->idredesocial, 
                "link" => $request->link, 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogRedeSocialController@listar")->withInput(["sucesso" => "Rede social atualizada com sucesso"]);
    }

    public function deletar($id) {
        BlogRedeSocial::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.blogRedeSocial.formulario", ["pagina" => "configuracoes", "subpagina" => "redesocial"])->with("redesocial", BlogRedeSocial::find($id))->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function formulario() {
        return view("painel.blogRedeSocial.formulario", ["pagina" => "configuracoes", "subpagina" => "redesocial"])->with("redesocial", new BlogRedeSocial())->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function json() {
        return response()->json(BlogRedeSocial::all());
    }
    
    public function listar(Request $request) {
        $redessociais = BlogRedeSocial::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $redessociais = BlogRedeSocial::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.blogRedeSocial.lista", ["pagina" => "configuracoes", "subpagina" => "redesocial"])->with("redessociais", $redessociais);
    }

    public function salvar(Request $request) {
        BlogRedeSocial::create([
            "idredesocial" => $request->idredesocial, 
            "link" => $request->link, 
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("BlogRedeSocialController@listar")->withInput(["sucesso" => "Rede social salva com sucesso"]);
    }
}
