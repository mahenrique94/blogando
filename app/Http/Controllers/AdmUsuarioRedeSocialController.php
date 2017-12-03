<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\AdmUsuarioRedeSocial;
use App\CadRedeSocial;

class AdmUsuarioRedeSocialController extends Controller implements GenericoController
{
    public function atualizar(Request $request) {
        AdmUsuarioRedeSocial::where("id", $request->id)
            ->update([
                "idredesocial" => $request->idredesocial,
                "link" => $request->link,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmUsuarioRedeSocialController@listar")->withInput(["sucesso" => "Rede social atualizada com sucesso"]);
    }

    public function deletar($id) {
        AdmUsuarioRedeSocial::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.admUsuarioRedeSocial.formulario", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redesocial", AdmUsuarioRedeSocial::find($id))->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function formulario() {
        return view("painel.admUsuarioRedeSocial.formulario", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redesocial", new AdmUsuarioRedeSocial())->with("redessociais", CadRedeSocial::orderBy("descricao")->get());
    }

    public function json() {
        return response()->json(AdmUsuarioRedeSocial::all());
    }

    public function listar(Request $request) {
        $redessociais = AdmUsuarioRedeSocial::where("idusuario", Auth::user()->idusuario)->get();
        if ($request->has("campo") && $request->has("filtro")) {
            $redessociais = AdmUsuarioRedeSocial::where($request->campo, "like", $request->filtro)->where("idusuario", Auth::user()->idusuario)->get();
        }
        return view("painel.admUsuarioRedeSocial.lista", ["pagina" => "usuarios", "subpagina" => "usuariosredesocial"])->with("redessociais", $redessociais);
    }

    public function salvar(Request $request) {
        AdmUsuarioRedeSocial::create([
            "idusuario" => Auth::id(),
            "idredesocial" => $request->idredesocial,
            "link" => $request->link,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmUsuarioRedeSocialController@listar")->withInput(["sucesso" => "Rede social salva com sucesso"]);
    }
}
