<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogNotificacaoUsuario extends Model
{
    protected $table = "bg_blog_notificacaousuario";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function notificacao() {
        return $this->belongsTo("\App\BlogNotificacao", "idnotificacao");
    }
}
