<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostAutorRedeSocial extends Model
{
    protected $table = "bg_post_autorredesocial";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at", "token", "remember_token"];

    public function redesocial() {
        return $this->belongsTo("\App\CadRedeSocial", "idredesocial");
    }
}
