<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogParametros extends Model
{
    protected $table = "bg_blog_parametros";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
