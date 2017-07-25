<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostSituacao extends Model
{
    protected $table = "bg_post_situacao";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
