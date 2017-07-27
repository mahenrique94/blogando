<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = "bg_blog";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function parametros() {
        return $this->hasOne("\App\BlogParametros", "idblog", "id");
    }

    public function aparencia() {
        return $this->hasOne("\App\BlogAparencia", "idblog", "id");
    }
}
