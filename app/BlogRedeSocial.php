<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogRedeSocial extends Model
{
    protected $table = "bg_blog_redesocial";
    protected $guarded = ["id", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function redesocial() {
        return $this->belongsTo("\App\CadRedeSocial", "idredesocial");
    }
}
