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
                if ($this->usuarioTemMaisDeUmPerfil($usuario)) {
                    return redirect()->action("AutenticacaoController@escolherPerfil", ["idUsuario" => $usuario[0]->idusuario, "relembrar" => $request->relembrar]);
                } else {
                    Auth::loginUsingId($usuario[0]->id, $request->relembrar);
                    return redirect()->action("DashboardController@index");
                }
            } else {
                return back()->withInput(["erro" => "Email ou senha esta inválido."]);
            }
        } else {
            return back()->withInput(["erro" => "Email ou senha esta inválido."]);
        }
    }

    public function autenticarPerfil($idPerfil) {
        Auth::loginUsingId($idPerfil);
        return redirect()->action("DashboardController@index");
    }

    public function formulario() {
        return view("painel.autenticacao.formulario");
    }

    public function escolherPerfil($idUsuario, $relembrar) {
        Auth::logout();
        return view ("painel.autenticacao.perfils")->with("relembrar", $relembrar)->with("perfils", TblPerfil::where("idusuario", $idUsuario)->get());
    }

    public function sair() {
        Auth::logout();
        return redirect()->action("AutenticacaoController@formulario");
    }

    public function selecionouUmPerfil($id) {
        return $id > 0;
    }

    private function usuarioTemMaisDeUmPerfil($usuarios) {
        return count($usuarios) > 1;
    }

}
