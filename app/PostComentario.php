<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComentario extends Model
{
    protected $table = "bg_post_comentario";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
