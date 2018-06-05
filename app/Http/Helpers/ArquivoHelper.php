<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 04/06/18
 * Time: 22:35
 */

namespace App\Http\Helpers;


class ArquivoHelper {

    public static function hash($arquivo) {
        return str_slug($arquivo) . "_" . uniqid() . "_bg";
    }

}