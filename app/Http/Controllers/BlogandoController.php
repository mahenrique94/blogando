<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostComentario;
use App\Blog;
use App\TblPerfil;
use App\CadCategoria;
use App\CadTag;
use DB;

class BlogandoController extends Controller
{

    private $blog;
    private $quantidadeDePostsPorPagina;

    public function __construct() {
        $this->blog = Blog::first();
        $this->quantidadeDePostsPorPagina = $this->blog->parametros->quantidadepostsporpagina;
    }

    public function anuncie() {
        return view("temas." . $this->blog->aparencia->temablog .  ".anuncie")->with("pagina", "index");
    }

    public function arquivo($ano, $mes, $pagina = 1) {
        $query = Post::where(DB::raw("extract(year from datapostagem)"), $ano)
            ->where(DB::raw("extract(month from datapostagem)"), $mes)
            ->orderBy("bg_post.datapostagem", "desc");

        $quantidadeDePosts = $query->count();
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        $posts = $query->skip($skip)->take($this->quantidadeDePostsPorPagina)->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "arquivo")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "/arquivo/" . $ano . "/" . $mes)
            ->with("posts", $posts)->with("mes", $mes)
            ->with("ano", $ano);
    }

    public function autor($slug, $pagina = 1) {
        $query = Post::join("bg_tbl_perfil", "bg_post.idperfil", "bg_tbl_perfil.id")
            ->where("bg_tbl_perfil.slug", $slug)
            ->orderBy("bg_post.datapostagem", "desc");

        $quantidadeDePosts = $query->count();
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        $posts = $query->skip($skip)->take($this->quantidadeDePostsPorPagina)->select("bg_post.*")->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "autor")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "/autor/" . $slug)
            ->with("posts", $posts)
            ->with("autor", TblPerfil::where("slug", $slug)->first());
    }

    public function categoria($slug, $pagina = 1) {
        $query = Post::join("bg_post_categoria", "bg_post_categoria.idpost", "bg_post.id")
            ->join("bg_cad_categoria", "bg_post_categoria.idcategoria", "bg_cad_categoria.id")
            ->where("bg_cad_categoria.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc");

        $quantidadeDePosts = $query->count();
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        $posts = $query->skip($skip)->take($this->quantidadeDePostsPorPagina)->select("bg_post.*")->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "categoria")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "/categoria/" . $slug)
            ->with("posts", $posts)
            ->with("categoria", CadCategoria::where("slug", $slug)->first())
            ->with("categoriafiltrada", CadCategoria::where("slug", $slug)->first());
    }

    public function comentar(Request $request) {
        $comentario = PostComentario::create([
            "idpost" => $request->idpost,
            "idperfil" => $request->idperfil,
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
        return view("temas." . $this->blog->aparencia->temablog .  ".contato")->with("pagina", "index");
    }

    public function index($pagina = 1) {
        $quantidadeDePosts = Post::count();
        $quantidadeDePaginas = intval(ceil($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "index")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "")
            ->with("posts", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->skip($skip)->take($this->quantidadeDePostsPorPagina)->get())
            ->with("postssemdestaque", Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->skip(3)->take($this->blog->parametros->quantidadepostsporpagina)->get());
    }

    public function post($slug) {
        return view("temas." . $this->blog->aparencia->temablog .  ".visualizar")
            ->with("pagina", "visualizar")
            ->with("metodo", "visualizar")
            ->with("post", Post::where("slug", $slug)->first());
    }

    public function procurar(Request $request, $pagina = 1) {
        $query = Post::where(DB::raw("lower(titulo)"), "like", "%" . $request->filtro . "%")->orderBy("datapostagem", "desc");

        $quantidadeDePosts = $query->count();
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        $posts = $query->skip($skip)->take($this->quantidadeDePostsPorPagina)->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "procurar")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "/procurar")
            ->with("posts", $posts)
            ->with("filtro", $request->filtro);
    }

    public function sobre() {
        return view("temas." . $this->blog->aparencia->temablog .  ".sobre");
    }

    public function tag($slug, $pagina = 1) {
        $query = Post::join("bg_post_tag", "bg_post_tag.idpost", "bg_post.id")
            ->join("bg_cad_tag", "bg_post_tag.idtag", "bg_cad_tag.id")
            ->where("bg_cad_tag.slug", "=", $slug)
            ->orderBy("bg_post.datapostagem", "desc");

        $quantidadeDePosts = $query->count();
        $quantidadeDePaginas = intval(round($quantidadeDePosts / $this->quantidadeDePostsPorPagina));
        $skip = ($pagina * $this->quantidadeDePostsPorPagina) - $this->quantidadeDePostsPorPagina;

        $posts = $query->skip($skip)->take($this->quantidadeDePostsPorPagina)->select("bg_post.*")->get();
        return view("temas." . $this->blog->aparencia->temablog .  ".index")
            ->with("pagina", "index")
            ->with("metodo", "tag")
            ->with("paginas", $quantidadeDePaginas)
            ->with("paginaAtual", $pagina)
            ->with("resultado", $quantidadeDePosts)
            ->with("link", "/tag/" . $slug)
            ->with("posts", $posts)
            ->with("tag", CadTag::where("slug", $slug)->first());
    }
    
}
