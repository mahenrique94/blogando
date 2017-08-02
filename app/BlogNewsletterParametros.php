<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogNewsletterParametros extends Model
{
    protected $table = "bg_blog_newsletterparametros";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
