<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostComentario;
use App\Blog;
use App\PostAutor;
use App\CadCategoria;
use App\CadTag;
use DB;

class BlogandoController extends Controller
{

    private $blog;

    public function __construct() {
        $this->blog = Blog::first();
    }

    public function arquivo($ano, $mes) {
        $posts = Post::where(DB::raw("extract(year from datapostagem)"), $ano)
            ->where(DB::raw("extract(month from datapostagem)"), $mes)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("posts", $posts)->with("mes", $mes)->with("ano", $ano);
    }

    public function autor($slug) {
        $posts = Post::join("bg_post_autor", "bg_post.idautor", "bg_post_autor.id")
            ->where("bg_post_autor.slug", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("posts", $posts)->with("autor", PostAutor::where("slug", $slug)->first());
    }

    public function comentar(Request $request) {
        $comentario = PostComentario::create([
            "idpost" => $request->idpost,
            "nome" => $request->nome,
            "email" => $request->email,
            "comentario" => $request->comentario,
            "avisarnovoscomentarios" => $request->avisarnovoscomentarios,
            "avisarrespostas" => $request->avisarrespostas,
            "aprovado" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $post = Post::find($comentario->idpost);
        return redirect()->action("BlogandoController@post", ["slug" => $post->slug]);
    }

    public function categoria($slug) {
        $posts = Post::join("bg_post_categoria", "bg_post_categoria.idpost", "bg_post.id")
            ->join("bg_cad_categoria", "bg_post_categoria.idcategoria", "bg_cad_categoria.id")
            ->where("bg_cad_categoria.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("posts", $posts)->with("categoria", CadCategoria::where("slug", $slug)->first());
    }

    public function index() {
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("posts", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->take($this->blog->parametros->quantidadepostsporpagina)->get());;
    }

    public function post($slug) {
        return view("temas." . $this->blog->aparencia->temablog .  ".visualizar")->with("post", Post::where("slug", $slug)->first());
    }

    public function tag($slug) {
        $posts = Post::join("bg_post_tag", "bg_post_tag.idpost", "bg_post.id")
            ->join("bg_cad_tag", "bg_post_tag.idtag", "bg_cad_tag.id")
            ->where("bg_cad_tag.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("posts", $posts)->with("tag", CadTag::where("slug", $slug)->first());
    }
}
