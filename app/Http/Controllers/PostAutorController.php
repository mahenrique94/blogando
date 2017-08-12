<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostAutor;
use App\AdmGrupo;

class PostAutorController extends Controller
{
    private $arquivoController;
    private $autorParametrosController;

    public function __construct(ArquivoController $arquivoController, PostAutorParametrosController $autorParametrosController) {
        $this->arquivoController = $arquivoController;
        $this->autorParametrosController = $autorParametrosController;
    }

    public function atualizar(Request $request) {
        PostAutor::where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "apelido" => $request->apelido,
                "idgrupo" => $request->grupo,
                "email" => $request->email,
                "senha" => $request->senha,
                "perfil" => $request->perfil,
                "slug" => str_slug($request->nome),
                "imagem" => $this->subindoImagem($request),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostAutorController@listar")->withInput(["sucesso" => "Autor atualizado com sucesso"]);
    }

    public function deletar($id) {
        PostAutor::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.postAutor.formulario", ["pagina" => "usuarios", "subpagina" => "perfil"])->with("autor", PostAutor::find($id))->with("grupos", AdmGrupo::all());
    }

    public function formulario() {
        return view("painel.postAutor.formulario", ["pagina" => "usuarios", "subpagina" => "perfil"])->with("autor", new PostAutor())->with("grupos", AdmGrupo::all());
    }

    public function json() {
        return response()->json(PostAutor::all());
    }

    public function listar(Request $request) {
        $autores = PostAutor::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $autores = PostAutor::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.PostAutor.lista", ["pagina" => "usuarios", "subpagina" => "todosusuarios"])->with("autores", $autores);
    }

    public function salvar(Request $request) {
        $autor = PostAutor::create([
            "nome" => $request->nome,
            "apelido" => $request->apelido,
            "idgrupo" => $request->grupo,
            "email" => $request->email,
            "senha" => $request->senha,
            "perfil" => $request->perfil,
            "slug" => str_slug($request->nome),
            "imagem" => $this->subindoImagem($request),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $this->autorParametrosController->criarNovo($autor->id);
        return redirect()->action("PostAutorController@listar")->withInput(["sucesso" => "Autor salva com sucesso"]);
    }

    private function subindoImagem($request) {
        if ($request->hasFile("file") && $request->file->isValid()) {
            $imagem = str_slug($request->nome) . ".jpg";
            $this->arquivoController->uploadToDirectory($request->file, $imagem, "usuarios");
            return $imagem;
        }
        if (!is_null($request->imagem))
            return $request->imagem;
        return null;
    }
}
