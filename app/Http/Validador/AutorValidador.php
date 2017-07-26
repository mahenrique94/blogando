<?php

namespace App\Http\Validador;

class AutorValidador {

    public static function ehIgual($autor, $email, $senha) {
        return $autor->email === $email && $autor->senha === $senha;
    }

    public static function estaAtivo($autor) {
        return !$autor->inativo;
    }

    public static function validar($autor) {
        return !is_null($autor) && !is_null($autor->id) && AutorValidador::estaAtivo($autor) 
            && AutorValidador::validarEmail($autor->email) && AutorValidador::validarSenha($autor->senha);
    }

    public static function validarEmail($email) {
        return !is_null($email) && strlen($email) > 0 && !empty($email);
    }

    public static function validarSenha($senha) {
        return !is_null($senha) && strlen($senha) > 0 && !empty($senha);
    }

}