<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogParametros;

class BlogParametrosController extends Controller
{
    public function compartilhamento() {

    }

    public function discussao() {

    }
    
    public function escrita() {
        return view("painel.configuracoes.escrita", ["pagina" => "configuracoes"], ["subpagina" => "escrita"]);
    }

    public function escritaAtualizar(Request $request) {
        BlogParametros::where("id", $request->id)
            ->update([
                "usarmarkdown" => $request->usarmarkdown,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogParametrosController@escrita")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }
    
    public function leitura() {
        return view("painel.configuracoes.leitura", ["pagina" => "configuracoes"], ["subpagina" => "leitura"]);
    }
}
