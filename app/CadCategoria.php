<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadCategoria extends Model
{
    protected $table = "bg_cad_categoria";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
