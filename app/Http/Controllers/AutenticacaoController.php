<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Validador\AutorValidador;
use App\PostAutor;

class AutenticacaoController extends Controller
{
    public function autenticar(Request $request) {
        if (AutorValidador::validarEmail($request->email) && AutorValidador::validarSenha($request->senha)) {
            $autor = PostAutor::where("email", $request->email)
                ->where("senha", $request->senha)
                ->where("inativo", false)->first();
            if (AutorValidador::validar($autor) && AutorValidador::ehIgual($autor, $request->email, $request->senha)) {
                Auth::login($autor);
                return redirect()->action("DashboardController@index");
            } else {
                return redirect()->action("AutenticacaoController@formulario")->withInput(["erro" => "Email ou senha inválido"]);
            }
        }
    }

    public function formulario() {
        return view("painel.autenticacao.formulario");
    }

    public function sair() {

    }
}
