<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadRedeSocial extends Model
{
    protected $table = "bg_cad_redesocial";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
