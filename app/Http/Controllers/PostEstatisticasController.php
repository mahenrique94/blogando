<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostEstatisticas;
use Illuminate\Support\Facades\Auth;

class PostEstatisticasController extends Controller
{
    public function criarNova($idPost, $idTipo) {
        PostEstatisticas::create([
            "idpost" => $idPost,
            "idperfil" => Auth::id(),
            "idtipoestatistica" => $idTipo,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return response("Estatística criada com sucesso", 200);
    }
}
