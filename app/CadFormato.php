<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadFormato extends Model
{
    protected $table = "bg_cad_formato";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
