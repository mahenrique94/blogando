<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComentario extends Model
{
    protected $table = "bg_post_comentario";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function perfil() {
        return $this->belongsTo("\App\TblPerfil", "idperfil");
    }

    public function comentarios() {
        return $this->hasMany("\App\PostComentario", "idcomentario", 'id');
    }

    public function post() {
        return $this->belongsTo("\App\Post", "idpost");
    }
}
