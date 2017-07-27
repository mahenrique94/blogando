<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTema extends Model
{
    protected $table = "bg_blog_tema";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
