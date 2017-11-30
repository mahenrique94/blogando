<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmUsuarioParametros extends Model
{
    protected $table = "bg_adm_usuarioparametros";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];
}
