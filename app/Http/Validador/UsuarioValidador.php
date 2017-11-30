<?php

namespace App\Http\Validador;

class UsuarioValidador {

    public static function ehIgual($usuario, $email, $senha) {
        return $usuario->email === $email && $usuario->senha === $senha;
    }

    public static function estaAtivo($usuario) {
        return !$usuario->inativo;
    }

    public static function temPerfil($usuario) {
        return count($usuario->perfils) > 0;
    }

    public static function validar($usuario) {
        return !is_null($usuario) && !is_null($usuario->id) && UsuarioValidador::estaAtivo($usuario) && UsuarioValidador::temPerfil($usuario)
            && UsuarioValidador::validarEmail($usuario->email) && UsuarioValidador::validarSenha($usuario->senha);
    }

    public static function validarEmail($email) {
        return !is_null($email) && strlen($email) > 0 && !empty($email);
    }

    public static function validarSenha($senha) {
        return !is_null($senha) && strlen($senha) > 0 && !empty($senha);
    }

}