<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class ArquivoController extends Controller
{
    private $ano;
    private $mes;
    private $dia;
    private $blog;

    public function __construct() {
        $this->ano = date_format(date_create(date("Y-m-d H:i")), "Y");
        $this->mes = date_format(date_create(date("Y-m-d H:i")), "m");
        $this->dia = date_format(date_create(date("Y-m-d H:i")), "d");
        $this->blog = $blog = Blog::first();
    }

    public function delete($pasta, $ano, $mes, $arquivo) {
        Storage::delete($pasta . $ano . "/" . $mes . "/" . $arquivo);
    }

    public function download($pasta = "", $ano = "", $mes = "", $arquivo = "") {                
        return response()->download($this->criandoPath($pasta, $ano, $mes, $arquivo));
    }

    public function save($request, $name, $directory) {
        if ($request->hasFile("file") && $request->file->isValid()) {
            $imagem = str_slug($name) . ".jpg";
            $this->uploadToDirectory($request->file, $imagem, $directory);
            return $imagem;
        }
        if (!is_null($request->imagem))
            return $request->imagem;
        return null;
    }

    public function upload($file, $arquivo = "", $pasta = "", $ano = "", $mes = "") {
        $ano = !empty($ano) ? $ano : $this->ano;
        $mes = !empty($mes) ? $mes : $this->mes;
        $path = $this->criandoPath($pasta, $ano, $mes);
        if (!is_null($this->blog->path) && !empty($this->blog->path))
            $file->move($path, $arquivo);
        else
            $file->storeAs("public" . "/" . $pasta . "/" . $ano . "/" . $mes, $arquivo);
        return response("Arquivo carregado e salvo com sucesso", HTTP::OK);
    }

    public function uploadToDirectory($file, $arquivo = "", $pasta = "") {
        $path = $this->criandoPath($pasta);
        if (!is_null($this->blog->path) && !empty($this->blog->path))
            $file->move($path, $arquivo);
        else
            $file->storeAs("public" . "/" . $pasta, $arquivo);
        return response("Arquivo carregado e salvo com sucesso", HTTP::OK);
    }

    public function visualizar($pasta = "", $ano = "", $mes = "", $arquivo = "") {
        return response()->make(file_get_contents($this->criandoPath($pasta, $ano, $mes, $arquivo)), HTTP::OK, ['content-type' => mime_content_type($this->criandoPath($pasta, $ano, $mes, $arquivo))]);
    }

    private function criandoPath($pasta = "", $ano = "", $mes = "", $arquivo = "") {
        $path = !is_null($this->blog->path) && !empty($this->blog->path) ? ($this->blog->path . "/") : storage_path("app/public/");
        $pasta = str_replace("-", "/", $pasta);

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
