<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogNewsletter extends Model
{
    protected $table = "bg_blog_newsletter";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];
}
