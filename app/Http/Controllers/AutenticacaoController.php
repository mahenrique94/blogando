<?php

namespace App\Http\Controllers;

use App\AdmUsuario;
use App\TblPerfil;
use App\UsuarioLogado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Validador\UsuarioValidador;

class AutenticacaoController extends Controller
{
    public function autenticar(Request $request) {
        if (UsuarioValidador::validarEmail($request->email) && UsuarioValidador::validarSenha($request->senha)) {
            $usuario = AdmUsuario::where("email", $request->email)
                ->where("senha", $request->senha)
                ->where("inativo", false)->first();
            if (UsuarioValidador::validar($usuario) && UsuarioValidador::ehIgual($usuario, $request->email, $request->senha)) {
                Auth::loginUsingId($usuario->id);
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
        Auth::logout();
        return redirect()->action("AutenticacaoController@formulario");
    }
}
