<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\PostAutorRedeSocial;
use App\CadRedeSocial;

class PostAutorRedeSocialController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        PostAutorRedeSocial::where("id", $request->id)
            ->update([
                "idredesocial" => $request->idredesocial,
                "link" => $request->link,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostAutorRedeSocialController@listar")->withInput(["sucesso" => "Rede social atualizada com sucesso"]);
    }

    public function deletar($id) {
        PostAutorRedeSocial::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.postAutorRedeSocial.formulario", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redesocial", PostAutorRedeSocial::find($id))->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function formulario() {
        return view("painel.postAutorRedeSocial.formulario", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redesocial", new PostAutorRedeSocial())->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function json() {
        return response()->json(PostAutorRedeSocial::all());
    }

    public function listar(Request $request) {
        $redessociais = PostAutorRedeSocial::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $redessociais = PostAutorRedeSocial::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.postAutorRedeSocial.lista", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redessociais", $redessociais);
    }

    public function salvar(Request $request) {
        PostAutorRedeSocial::create([
            "idautor" => Auth::id(),
            "idredesocial" => $request->idredesocial,
            "link" => $request->link,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("PostAutorRedeSocialController@listar")->withInput(["sucesso" => "Rede social salva com sucesso"]);
    }
}
