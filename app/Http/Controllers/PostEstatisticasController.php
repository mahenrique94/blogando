<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostEstatisticas;

class PostEstatisticasController extends Controller
{
    public function criarNova($idPost) {
        $estatistica = PostEstatisticas::create([
            "idpost" => $idPost,
            "curtidas" => 0,
            "visualizacoes" => 0,
            "compartilhamentos" => 0,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("PostController@editar", ["id" => $idPost])->withInput(["sucesso" => "Post salvo com sucesso"]);
    }
}
