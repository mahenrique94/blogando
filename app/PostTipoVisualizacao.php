<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTipoVisualizacao extends Model
{
    protected $table = "bg_post_tipovisualizacao";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];
}
