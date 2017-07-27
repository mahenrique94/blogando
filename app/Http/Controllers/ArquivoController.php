<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoController extends Controller
{
    public function download($pasta, $ano, $mes, $arquivo) {                
        return response()->download($this->criandoPath($pasta, $ano, $mes, $arquivo));
    }

    public function upload($file, $pasta, $ano, $mes, $arquivo) {
        $file->move(criandoPath, $arquivo);
        return response("Arquivo carregado e salvo com sucesso", 200);
    }

    public function visualizar($pasta, $ano, $mes, $arquivo) {                
        return response()->make(file_get_contents($this->criandoPath($pasta, $ano, $mes, $arquivo)), 200, ['content-type' => 'image/jpg']);
    }

    private function criandoPath($pasta = "", $ano = "", $mes = "", $arquivo = "") {
        $path = storage_path("app/public/");
        if (!empty($pasta))
            $path = $path . $pasta . "/";
        if (!empty($ano))
            $path = $path . $ano . "/";
        if (!empty($mes))
            $path = $path . $mes . "/";
            if (!empty($arquivo))
            $path = $path . $arquivo;
        return $path;
    }
}
