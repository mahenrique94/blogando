<?php

namespace App\Http\Helpers;


class PerfilHelper {

    const ADMINISTRADOR = 1;

    public static function ehAdministrador($grupo) {
        return $grupo === PerfilHelper::ADMINISTRADOR;
    }

}