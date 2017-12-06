<?php

namespace App;

use App\Http\Parametros;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class TblPerfil extends Model
{
    protected $table = "bg_tbl_perfil";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function blog() {
        return $this->belongsTo("\App\Blog", "idblog");
    }

    public function usuario() {
        return $this->belongsTo("\App\AdmUsuario", "idusuario");
    }

    public function grupo() {
        return $this->belongsTo("\App\AdmGrupo", "idgrupo");
    }

    public function icone() {
        $icone = null;
        if ($this->grupo->descricao === "Administrador")
            $icone = "icon-street-view";
        elseif ($this->grupo->descricao === "Colaborador")
            $icone = "icon-users";
        elseif ($this->grupo->descricao === "Revisor")
            $icone = "icon-user-secret";
        elseif ($this->grupo->descricao === "Escritor")
            $icone = "icon-keyboard";
        elseif ($this->grupo->descricao === "Autor")
            $icone = "icon-font";
        elseif ($this->grupo->descricao === "Editor")
            $icone = "icon-pencil";
        else
            $icone = "icon-newspaper";
        return $icone;
    }

    public static function ehLeitor() {
        return Auth::user()->idgrupo === Parametros::GRUPO_LEITOR;
    }

    public static function naoEhLeitor() {
        return Auth::user()->idgrupo < Parametros::GRUPO_LEITOR;
    }

}
