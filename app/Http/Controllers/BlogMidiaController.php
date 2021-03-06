<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ArquivoHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\BlogMidia;

class BlogMidiaController extends Controller
{

    private $arquivoController;

    public function __construct(ArquivoController $arquivoController) {
        $this->arquivoController = $arquivoController;
    }

    public function adicionar(Request $request) {
        if ($request->hasFile("arquivos")) {
            foreach ($request->arquivos as $arquivo) :
                if ($arquivo->isValid()) {
                    $nome = uniqid() . "_bg";
                    $slug = $nome . "." . $arquivo->getClientOriginalExtension();
                    $this->arquivoController->upload($arquivo, $slug, "arquivos/imagens");
                    BlogMidia::create([
                        "idtipomidia" => $request->idtipomidia,
                        "nome" => $nome,
                        "slug" => $slug,
                        "created_at" => date("Y-m-d H:i:s"), 
                        "updated_at" => date("Y-m-d H:i:s"),
                    ]);
                }
            endforeach;
        }
        return redirect()->action("BlogMidiaController@biblioteca")->withInput(["sucesso" => "Arquivos enviados e salvos com sucesso"]);
    }

    public function biblioteca() {
        return view("painel.midia.biblioteca", ["pagina" => "midia", "subpagina" => "biblioteca"])->with("midias", BlogMidia::all());
    }

    public function deletar($id) {
        $midia = BlogMidia::find($id);
        $this->arquivoController->delete("public/arquivos/imagens/", date_format(date_create($midia->created_at), "Y"), date_format(date_create($midia->created_at), $midia->slug));
        BlogMidia::destroy($id);
        return response($midia->slug, HTTP::OK);
    }

    public function formulario(Request $request) {
        return view("painel.midia.formulario", ["pagina" => "midia", "subpagina" => "novamidia"]);
    }
}
