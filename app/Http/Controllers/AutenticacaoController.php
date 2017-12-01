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
            $email = $request->email;
            $senha = $request->senha;
            $usuario = TblPerfil::join("bg_adm_usuario", "bg_tbl_perfil.idusuario", "bg_adm_usuario.id")
                ->where("bg_adm_usuario.email", $email)
                ->where("bg_adm_usuario.senha", $senha)
                ->where("bg_adm_usuario.inativo", false)->select("bg_tbl_perfil.*")->get();
            if (UsuarioValidador::validarBusca($usuario)) {
                if (count($usuario) > 1) {
                    // Implementar login com perfis diferentes
                } else {
                    Auth::loginUsingId($usuario[0]->id, true);
                    return redirect()->action("DashboardController@index");
                }
            } else {
                return redirect()->action("AutenticacaoController@formulario")->withInput(["erro" => "Email ou senha esta inválido."]);
            }
        } else {
            return redirect()->action("AutenticacaoController@formulario")->withInput(["erro" => "Email ou senha esta inválido."]);
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
