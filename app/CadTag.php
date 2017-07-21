<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CadTag extends Model
{
    protected $table = "bg_cad_tag";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
