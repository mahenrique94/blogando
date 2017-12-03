<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use App\TblPerfil;
use App\AdmGrupo;

class TblPerfilController extends Controller implements GenericoController
{
    private $arquivoController;

    public function __construct(ArquivoController $arquivoController) {
        $this->arquivoController = $arquivoController;
    }

    public function atualizar(Request $request) {
        TblPerfil::where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "apelido" => $request->apelido,
                "idgrupo" => $request->grupo,
                "idusuario" => $request->idusuario,
                "descricao" => $request->descricao,
                "slug" => str_slug($request->nome),
                "imagem" => $this->subindoImagem($request),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("AdmUsuarioController@editar", ["id" => $request->idusuario])->withInput(["sucesso" => "Perfil atualizado com sucesso"]);
    }

    public function deletar($id) {
        TblPerfil::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.tblPerfil.formulario", ["pagina" => "usuarios", "subpagina" => "perfil"])->with("perfil", TblPerfil::find($id))->with("grupos", AdmGrupo::all());
    }

    public function formulario() {
        return view("painel.tblPerfil.formulario", ["pagina" => "usuarios", "subpagina" => "perfil"])->with("perfil", new TblPerfil())->with("grupos", AdmGrupo::all());
    }

    public function json() {
        return response()->json(TblPerfil::all());
    }

    public function listar(Request $request) { }

    public function salvar(Request $request) {
        TblPerfil::create([
            "nome" => $request->nome,
            "apelido" => $request->apelido,
            "idgrupo" => $request->grupo,
            "idusuario" => $request->idusuario,
            "descricao" => $request->descricao,
            "slug" => str_slug($request->nome),
            "imagem" => $this->subindoImagem($request),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("AdmUsuarioController@editar", ["id" => $request->idusuario])->withInput(["sucesso" => "Perfil salvo com sucesso"]);
    }

    private function subindoImagem($request) {
        if ($request->hasFile("file") && $request->file->isValid()) {
            $imagem = str_slug($request->nome) . ".jpg";
            $this->arquivoController->uploadToDirectory($request->file, $imagem, "perfil");
            return $imagem;
        }
        if (!is_null($request->imagem))
            return $request->imagem;
        return null;
    }
}
