<?php

namespace App\Http\Controllers;

use App\Http\Parametros;
use Illuminate\Http\Request;
use App\BlogParametros;
use App\CadFormato;
use App\PostTipoVisualizacao;
use App\PostTipoCompartilhamento;

class BlogParametrosController extends Controller
{
    public function compartilhamento() {
        return view("painel.configuracoes.compartilhamento", ["pagina" => "configuracoes"], ["subpagina" => "compartilhamento"])->with("tiposcompartilhamento", PostTipoCompartilhamento::all());
    }

    public function compartilhamentoAtualizar(Request $request) {
        BlogParametros::where("id", $request->id)
            ->update([
                "idtipocompartilhamento" => $request->idtipocompartilhamento,
                "permitircompartilhamentos" => $request->permitircompartilhamentos,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogParametrosController@compartilhamento")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }

    public function discussao() {
        return view("painel.configuracoes.discussao", ["pagina" => "configuracoes"], ["subpagina" => "discussao"]);
    }

    public function discussaoAtualizar(Request $request) {
        BlogParametros::where("id", $request->id)
            ->update([
                "permitircomentarios" => $request->permitircomentarios,
                "permitircomentariosanonimos" => $request->permitircomentariosanonimos,
                "notificarnovoscomentarios" => $request->notificarnovoscomentarios,
                "comentariosdevemseraprovados" => $request->comentariosdevemseraprovados,
                "utilizarcomentariosdisqus" => $request->utilizarcomentariosdisqus,
                "identificacaodisqus" => $request->identificacaodisqus,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogParametrosController@discussao")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
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
        return view("painel.configuracoes.leitura", ["pagina" => "configuracoes"], ["subpagina" => "leitura"])
            ->with("formatosdata", CadFormato::where("idtipoformato", Parametros::TIPOFORMATO_FORMATODATA)->get())
            ->with("formatoshora", CadFormato::where("idtipoformato", Parametros::TIPOFORMATO_FORMATOHORA)->get())
            ->with("formatosdatahora", CadFormato::where("idtipoformato", Parametros::TIPOFORMATO_FORMATODATAHORA)->get())
            ->with("tiposvisualizacao", PostTipoVisualizacao::all());
    }

    public function leituraAtualizar(Request $request) {
        BlogParametros::where("id", $request->id)
            ->update([
                "idformatodata" => $request->idformatodata,
                "idformatohora" => $request->idformatohora,
                "idformatodatahora" => $request->idformatodatahora,
                "idtipovisualizacaopostsrelacionados" => $request->idtipovisualizacaopostsrelacionados,
                "quantidadepostsporpagina" => $request->quantidadepostsporpagina,
                "mostrarpostsrelacionados" => $request->mostrarpostsrelacionados,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogParametrosController@leitura")->withInput(["sucesso" => "Configurações atualizadas com sucesso"]);
    }
}
