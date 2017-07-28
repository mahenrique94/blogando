<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdmPermissao extends Model
{
    protected $table = "bg_adm_permissao";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
