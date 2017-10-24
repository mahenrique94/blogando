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

    public function anuncie() {
        return view("temas." . $this->blog->aparencia->temablog .  ".anuncie");
    }

    public function arquivo($ano, $mes) {
        $posts = Post::where(DB::raw("extract(year from datapostagem)"), $ano)
            ->where(DB::raw("extract(month from datapostagem)"), $mes)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->get();

        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "arquivo")
            ->with("posts", $posts)->with("mes", $mes)->with("ano", $ano);
    }

    public function autor($slug) {
        $posts = Post::join("bg_post_autor", "bg_post.idautor", "bg_post_autor.id")
            ->where("bg_post_autor.slug", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();

        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "autor")
            ->with("posts", $posts)->with("autor", PostAutor::where("slug", $slug)->first());
    }

    public function categoria($slug) {
        $posts = Post::join("bg_post_categoria", "bg_post_categoria.idpost", "bg_post.id")
            ->join("bg_cad_categoria", "bg_post_categoria.idcategoria", "bg_cad_categoria.id")
            ->where("bg_cad_categoria.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();

        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "categoria")
            ->with("posts", $posts)->with("categoria", CadCategoria::where("slug", $slug)->first())->with("categoriafiltrada", CadCategoria::where("slug", $slug)->first());
    }

    public function comentar(Request $request) {
        $comentario = PostComentario::create([
            "idpost" => $request->idpost,
            "idautor" => $request->idautor,
            "idcomentario" => $request->idcomentario,
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

    public function contato() {
        return view("temas." . $this->blog->aparencia->temablog .  ".contato");
    }

    public function index($pagina = 1) {
        $posts = Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->get();
        $quantidadeDePosts = count($posts->toArray());
        $quantidadeDePostsPorPagina = $this->blog->parametros->quantidadepostsporpagina;
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $quantidadeDePostsPorPagina));
        $posts = $posts->splice((($pagina * $this->blog->parametros->quantidadepostsporpagina) - $this->blog->parametros->quantidadepostsporpagina), ($pagina * $this->blog->parametros->quantidadepostsporpagina));
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "index")->with("paginas", $quantidadeDePaginas)->with("pagina", $pagina)
            ->with("posts", $posts)
            ->with("postssemdestaque", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->skip(3)->take($this->blog->parametros->quantidadepostsporpagina)->get());
    }

    public function post($slug) {
        return view("temas." . $this->blog->aparencia->temablog .  ".visualizar")->with("pagina", "visualizar")->with("metodo", "visualizar")->with("post", Post::where("slug", $slug)->first());
    }

    public function procurar(Request $request) {
        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "procurar")
            ->with("posts", Post::where(DB::raw("lower(titulo)"), "like", "%" . $request->filtro . "%")->orderBy("datapostagem", "desc")->take($this->blog->parametros->quantidadepostsporpagina)->get())->with("filtro", $request->filtro);
    }

    public function sobre() {
        return view("temas." . $this->blog->aparencia->temablog .  ".sobre");
    }

    public function tag($slug) {
        $posts = Post::join("bg_post_tag", "bg_post_tag.idpost", "bg_post.id")
            ->join("bg_cad_tag", "bg_post_tag.idtag", "bg_cad_tag.id")
            ->where("bg_cad_tag.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc")
            ->take($this->blog->parametros->quantidadepostsporpagina)
            ->select("bg_post.*")
            ->get();

        return view("temas." . $this->blog->aparencia->temablog .  ".index")->with("pagina", "index")->with("metodo", "tag")
            ->with("posts", $posts)->with("tag", CadTag::where("slug", $slug)->first());
    }
    
}
