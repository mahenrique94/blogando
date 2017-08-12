<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAutorParametros extends Model
{
    protected $table = "bg_post_autorparametros";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];
}
