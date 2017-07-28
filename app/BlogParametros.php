<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogParametros extends Model
{
    protected $table = "bg_blog_parametros";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function blog() {
        return $this->belongsTo("\App\Blog", "idblog");
    }
}
