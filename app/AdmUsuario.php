<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmUsuario extends Model
{
    protected $table = "bg_adm_usuario";
    protected $guarded = ["id", "created_at", "token", "remember_token"];
    protected $hidden = ["id", "created_at", "token", "remember_token"];

    public function perfils() {
        return $this->hasMany("\App\TblPerfil", "idusuario", "id");
    }

    public function redessociais() {
        return $this->hasMany("\App\AdmUsuarioRedeSocial", "idusuario", "id");
    }

    public function temUmPerfil() {
        return count($this->perfils()) == 1;
    }

}
