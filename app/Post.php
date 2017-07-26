<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "bg_post";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function autor() {
        return $this->belongsTo("\App\PostAutor", "idautor");
    }

    public function categorias() {
        return $this->hasMany("\App\PostCategoria", "idpost", "id");
    }

    public function situacao() {
        return $this->belongsTo("\App\PostSituacao", "idsituacao");
    }

    public function tags() {
        return $this->hasMany("\App\PostTag", "idpost", "id");
    }
}
