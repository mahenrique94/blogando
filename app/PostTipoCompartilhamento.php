<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTipoCompartilhamento extends Model
{
    protected $table = "bg_post_tipocompartilhamento";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
