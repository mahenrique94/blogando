<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogParametros extends Model
{
    protected $table = "bg_blog_parametros";
    protected $guarded = ["id", "idblog", "created_at"];
    protected $hidden = ["id", "created_at"];

    public function blog() {
        return $this->belongsTo("\App\Blog", "idblog");
    }

    public function formatodata() {
        return $this->belongsTo("\App\CadFormato", "idformatodata");
    }

    public function formatohora() {
        return $this->belongsTo("\App\CadFormato", "idformatohora");
    }

    public function formatodatahora() {
        return $this->belongsTo("\App\CadFormato", "idformatodatahora");
    }

    public function tipovisualizacaopostsrelacionados() {
        return $this->belongsTo("\App\PostTipoVisualizacao", "idtipovisualizacaopostsrelacionados");
    }
}
