<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmTipoAcesso extends Model
{
    protected $table = "bg_adm_tipoacesso";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
