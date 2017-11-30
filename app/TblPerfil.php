<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

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

}
