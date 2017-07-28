<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmGrupo extends Model
{
    protected $table = "bg_adm_grupo";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
