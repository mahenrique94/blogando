<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoria extends Model
{
    protected $table = "bg_post_categoria";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function categoria() {
        return $this->belongsTo("\App\CadCategoria", "idcategoria");
    }
}
