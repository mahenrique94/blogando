<?php

namespace App\Http\Controllers;

use App\Http\HTTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BlogNotificacaoUsuario;

class BlogNotificacaoController extends Controller
{
    public function ler($id) {
        BlogNotificacaoUsuario::create([
                "idperfil" => Auth::id(),
                "idnotificacao" => $id,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return response("Notificação lida com sucesso", HTTP::OK);
    }
}
