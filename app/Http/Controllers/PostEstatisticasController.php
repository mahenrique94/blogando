<?php

namespace App\Http\Controllers;

use App\Http\Parametros;
use Illuminate\Http\Request;
use App\PostEstatisticas;
use Illuminate\Support\Facades\Auth;

class PostEstatisticasController extends Controller
{

    public function curtirPost(Request $request) {
        return $this->criarNova($request->idpost, Parametros::TIPOESTATISTICA_CURTIDA);
    }

    public function favoritarPost(Request $request) {
        return $this->criarNova($request->idpost, Parametros::TIPOESTATISTICA_FAVORITO);
    }

    private function buscarEstatisticaPorUsuarioEPost($idPost, $idTipo) {
        return PostEstatisticas::where("idpost", $idPost)
            ->where("idperfil", Auth::id())
            ->where("idtipoestatistica", $idTipo)
            ->first();
    }

    private function criarNova($idPost, $idTipo) {
        $estatistica = $this->buscarEstatisticaPorUsuarioEPost($idPost, $idTipo);
        if ($this->usuarioJaCurtiuOPost($estatistica)) {
            $estatistica->forceDelete();
            return response("Estatística removida com sucesso", 200);
        } else {
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

    private function usuarioJaCurtiuOPost($estatistica) {
        return !is_null($estatistica);
    }

}
