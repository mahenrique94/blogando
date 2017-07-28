<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogNotificacao extends Model
{
    protected $table = "bg_blog_notificacao";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
