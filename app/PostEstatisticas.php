<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostEstatisticas extends Model
{
    protected $table = "bg_post_estatisticas";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function perfil() {
        return $this->belongsTo("\App\Post", "idpost");
    }

}
