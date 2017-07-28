<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PostAutor;

class BlogNotificacaoController extends Controller
{
    public function ler($id) {
        PostAutor::where("id", Auth::id())
            ->update([
                "idcategoriaatual" => $id,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        $id = DB::table("bg_post_categoria")->latest("id")->first();
        return response()->json($id);
    }
}
