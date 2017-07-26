<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $table = "bg_post_tag";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
