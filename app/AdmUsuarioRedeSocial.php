<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmUsuarioRedeSocial extends Model
{
    protected $table = "bg_adm_usuarioredesocial";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function redesocial() {
        return $this->belongsTo("\App\CadRedeSocial", "idredesocial");
    }
}
