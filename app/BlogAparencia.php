<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogAparencia extends Model
{
    protected $table = "bg_blog_aparencia";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function temamenu() {
        return $this->belongsTo("\App\BlogTema", "idtemamenu");
    }

    public function temaaside() {
        return $this->belongsTo("\App\BlogTema", "idtemaaside");
    }

    public function temaperfil() {
        return $this->belongsTo("\App\BlogTema", "idtemaperfil");
    }

    public function temanavegacao() {
        return $this->belongsTo("\App\BlogTema", "idtemanavegacao");
    }

    public function temanotificacao() {
        return $this->belongsTo("\App\BlogTema", "idtemanotificacao");
    }
}