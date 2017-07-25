<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAutor extends Model
{
    protected $table = "bg_post_autor";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
