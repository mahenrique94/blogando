<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class ArquivoController extends Controller
{
    public function download($pasta = "", $ano = "", $mes = "", $arquivo = "") {                
        return response()->download($this->criandoPath($pasta, $ano, $mes, $arquivo));
    }

    public function upload($file = "", $pasta = "", $ano = "", $mes = "", $arquivo = "") {
        $file->move($this->criandoPath($pasta, $ano, $mes, $arquivo));
        return response("Arquivo carregado e salvo com sucesso", 200);
    }

    public function visualizar($pasta, $ano, $mes, $arquivo) {                
        return response()->make(file_get_contents($this->criandoPath($pasta, $ano, $mes, $arquivo)), 200, ['content-type' => 'image/jpg']);
    }

    private function criandoPath($pasta = "", $ano = "", $mes = "", $arquivo = "") {
        $blog = Blog::find(Auth::user()->idblog);
        $path = !is_null($blog->path) && !empty($blog->path) ? ($blog->path . "/") : storage_path("app/public/");

        if (!empty($pasta) && !empty($ano))
            $path = $path . $pasta . "/";
        else
            $path = $path . $pasta;

        if (!empty($ano) && !empty($mes))
            $path = $path . $ano . "/";
        else
            $path = $path . $ano;

        if (!empty($mes) && !empty($arquivo))
            $path = $path . $mes . "/";
        else
            $path = $path . $mes;
            
        if (!empty($arquivo))
            $path = $path . $arquivo;

        return $path;
    }
}
