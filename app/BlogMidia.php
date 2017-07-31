<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogMidia extends Model
{
    protected $table = "bg_blog_midia";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
