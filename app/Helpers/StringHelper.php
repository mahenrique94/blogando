<?php

namespace App\Helpers;

class StringHelper {

    public static function criarSlug($string) {
        $string = StringHelper::trocarEspacoPorTraco($string);
        $string = StringHelper::retirarCaracteresEspeciais($string);
        return mb_strtolower($string);
    }

    public static function trocarEspacoPorTraco($string) {
        return str_replace(" ", "-", $string);
    }

    public static function retirarCaracteresEspeciais($string) {
        $string = preg_replace("/á/i", "a", $string);
        $string = preg_replace("/à/i", "a", $string);
        $string = preg_replace("/ã/i", "a", $string);
        $string = preg_replace("/â/i", "a", $string);
        $string = preg_replace("/é/i", "e", $string);
        $string = preg_replace("/ê/i", "e", $string);
        $string = preg_replace("/è/i", "e", $string);
        $string = preg_replace("/í/i", "i", $string);
        $string = preg_replace("/î/i", "i", $string);
        $string = preg_replace("/ì/i", "i", $string);
        $string = preg_replace("/ó/i", "o", $string);
        $string = preg_replace("/ô/i", "o", $string);
        $string = preg_replace("/ò/i", "o", $string);
        $string = preg_replace("/õ/i", "o", $string);
        $string = preg_replace("/ú/i", "u", $string);
        $string = preg_replace("/û/i", "u", $string);
        $string = preg_replace("/ù/i", "u", $string);
        $string = preg_replace("/ç/i", "c", $string);
        return $string;
    }

}