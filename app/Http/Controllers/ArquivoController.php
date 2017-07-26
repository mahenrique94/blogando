<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    public function download($pasta, $ano, $mes, $arquivo) {                
        return response()->download($this->criandoPath($pasta, $ano, $mes, $arquivo));
    }

    public function upload($file, $pasta, $ano, $mes, $arquivo) {
        $file->move(criandoPath, $arquivo);
        return response("Arquivo carregado e salvo com sucesso", 200);
    }

    private function criandoPath($pasta = "", $ano = "", $mes = "", $arquivo = "") {
        $path = "/Arquivo/Upload/blogando/";
        if (!empty($pasta))
            $path = $path . "/" . $pasta;
        if (!empty($ano))
            $path = $path . "/" . $ano;        
        if (!empty($mes))
            $path = $path . "/" . $mes;        
        if (!empty($arquivo))
            $path = $path . "/" . $arquivo;
        return $path;
    }
}
