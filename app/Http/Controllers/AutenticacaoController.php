<?php

namespace App\Http\Controllers;

use App\TblPerfil;
use App\VieUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Validador\UsuarioValidador;
use App\AdmUsuario;
use App\UsuarioLogado;

class AutenticacaoController extends Controller
{
    public function autenticar(Request $request) {
        if (UsuarioValidador::validarEmail($request->email) && UsuarioValidador::validarSenha($request->senha)) {
            $usuario = AdmUsuario::where("email", $request->email)
                ->where("senha", $request->senha)
                ->where("inativo", false)->first();
            if (UsuarioValidador::validar($usuario) && UsuarioValidador::ehIgual($usuario, $request->email, $request->senha)) {
                if ($usuario->temUmPerfil()) {
                    Auth::loginUsingId($usuario->id, true);
                    return redirect()->action("DashboardController@index");
                } else {
                    if (isset($request->perfil)) {
                        $usuario = VieUsuario::where("email", $request->email)
                            ->where("senha", $request->senha)
                            ->where("idperfil", $request->perfil)->first();
                        if (UsuarioValidador::validar($usuario) && UsuarioValidador::ehIgual($usuario, $request->email, $request->senha)) {
                            Auth::loginUsingId($usuario->id, true);
                            return redirect()->action("DashboardController@index");
                        } else {
                            return redirect()->action("AutenticacaoController@formulario")->withInput(["erro" => "Email ou senha inválido"]);
                        }
                    } else {
                        return redirect()->action("AutenticacaoController@formulario")->with(["perfils" => $usuario->perfils]);
                    }
                }
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
