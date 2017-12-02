<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PerfilHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\TblPerfil;
use App\PostEstatisticas;
use App\Blog;
use Parsedown;
use League\HTMLToMarkdown\HtmlConverter;

class PostController extends Controller implements GenericoController
{

    private $arquivoController;
    private $estatisticasController;
    private $blog;

    public function __construct(ArquivoController $arquivoController, PostEstatisticasController $estatisticasController) {
        $this->arquivoController = $arquivoController;
        $this->estatisticasController = $estatisticasController;
        $this->blog = Blog::first();
    }

    public function atualizar(Request $request) {
        Post::where("id", $request->id)
            ->update([
                "titulo" => $request->titulo, 
                "slug" => str_slug($request->titulo), 
                "imagem" => $this->subindoImagem($request),
                "conteudo" => $request->conteudo, 
                "conteudohtml" => $this->blog->parametros->usarmarkdown ? $this->markdownParaHtml($request->conteudo) : $request->conteudo,
                "conteudomarkdown" => $this->blog->parametros->usarmarkdown ? $request->conteudo : $this->htmlParaMarkdown($request->conteudo),
                "conteudoresumido" => $this->blog->parametros->usarmarkdown ? substr(strip_tags($this->markdownParaHtml($request->conteudo)), 0, 255) : substr(strip_tags($request->conteudo), 0, 255),
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostController@editar", ["id" => $request->id])->withInput(["sucesso" => "Post atualizado com sucesso"]);
    }

    public function deletar($id) {
        PostEstatisticas::where("idpost", $id)->delete();
        Post::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.post.formulario", ["pagina" => "posts", "subpagina" => "novopost"])->with("post", Post::find($id));
    }

    public function formulario() {
        return view("painel.post.formulario", ["pagina" => "posts", "subpagina" => "novopost"])->with("post", new Post());
    }

    public function json() {
        return response()->json(Post::all());
    }

    public function jsonRecentes() {
        return response()->json(Post::where("datapostagem", "<=", date("Y-m-d H:i"))->orderBy("datapostagem", "desc")->take(5)->get());
    }
    
    public function listar(Request $request) {
        $posts = null;

        if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
            $posts = Post::orderBy("id", "desc")->get();
        else
            $posts = Post::where("idperfil", Auth::id())->orderBy("id", "desc")->get();

        if ($request->has("campo") && $request->has("filtro")) {
            if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
                $posts = Post::where($request->campo, "like", "%" . $request->filtro . "%")->orderBy("id", "desc")->get();
            else
                $posts = Post::where($request->campo, "like", "%" . $request->filtro . "%")->where("idperfil", Auth::id())->orderBy("id", "desc")->get();
        }
        return view("painel.post.lista", ["pagina" => "posts"], ["subpagina" => "todos"])->with("posts", $posts);
    }

    public function listarAgendados(Request $request) {
        $posts = null;

        if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
            $posts = Post::where("idsituacao", 3)->get();
        else
            $posts = Post::where("idsituacao", 3)->where("idperfil", Auth::id())->get();

        if ($request->has("campo") && $request->has("filtro")) {
            if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", 3)->get();
            else
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", 3)->where("idperfil", Auth::id())->get();
        }
        return view("painel.post.agendados", ["pagina" => "posts"], ["subpagina" => "agendados"])->with("posts", $posts);
    }

    public function listarRascunhos(Request $request) {
        $posts = null;

        if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
            $posts = Post::where("idsituacao", 8)->get();
        else
            $posts = Post::where("idsituacao", 8)->where("idperfil", Auth::id())->get();


        if ($request->has("campo") && $request->has("filtro")) {
            if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", 8)->get();
            else
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", 8)->where("idperfil", Auth::id())->get();
        }
        return view("painel.post.rascunhos", ["pagina" => "posts"], ["subpagina" => "rascunhos"])->with("posts", $posts);
    }

    public function salvar(Request $request) {
        $post = Post::create([
            "idperfil" => Auth::id(),
            "idsituacao" => 1,
            "titulo" => $request->titulo, 
            "slug" => str_slug($request->titulo), 
            "imagem" => $this->subindoImagem($request),
            "conteudo" => $request->conteudo, 
            "conteudohtml" => $this->blog->parametros->usarmarkdown ? $this->markdownParaHtml($request->conteudo) : $request->conteudo,
            "conteudomarkdown" => $this->blog->parametros->usarmarkdown ? $request->conteudo : $this->htmlParaMarkdown($request->conteudo),
            "conteudoresumido" => substr(strip_tags($request->conteudo), 0, 255), 
            "datapostagem" => date("Y-m-d H:i:s"),
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $this->estatisticasController->criarNova($post->id);
        return redirect()->action("PostController@editar", ["id" => $post])->withInput(["sucesso" => "Post salvo com sucesso"]);
    }

    private function htmlParaMarkdown($string) {
        $converter = new HtmlConverter(array("header_style" => "atx"));
        return $converter->convert($string);
    }

    private function markdownParaHtml($string) {
        $parsedown = new Parsedown();
        return $parsedown->text($string);
    }

    private function subindoImagem($request) {
        if ($request->hasFile("file") && $request->file->isValid()) {
            $imagem = str_slug($request->titulo) . ".jpg";
            $this->arquivoController->upload($request->file, $imagem, "posts", date_format(date_create($request->datapostagem), "Y"), date_format(date_create($request->datapostagem), "m"));
            return $imagem;
        }
        if (!is_null($request->imagem))
            return $request->imagem;
        return null;
    }
}
