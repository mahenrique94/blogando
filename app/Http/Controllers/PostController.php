<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PerfilHelper;
use App\Http\HTTP;
use App\Http\Parametros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\TblPerfil;
use App\PostEstatisticas;
use App\Blog;
use Parsedown;
use League\HTMLToMarkdown\HtmlConverter;
use PhpParser\Node\Param;

class PostController extends Controller implements GenericoController
{

    private $arquivoController;
    private $blogandoController;
    private $blog;
    private $emailController;

    public function __construct(ArquivoController $arquivoController, BlogandoController $blogandoController, EmailController $emailController) {
        $this->arquivoController = $arquivoController;
        $this->blogandoController = $blogandoController;
        $this->blog = Blog::first();
        $this->emailController = $emailController;
    }

    public function atualizar(Request $request) {
        $this->atualizarPost($request, $request->idsituacao);
        return redirect()->action("PostController@editar", ["id" => $request->id])->withInput(["sucesso" => "Post atualizado com sucesso"]);
    }

    public function atualizarRascunho(Request $request) {
        $this->atualizarPost($request, Parametros::SITUACAOPOST_RASCUNHO, false);
        return redirect()->action("PostController@editar", ["id" => $request->id])->withInput(["sucesso" => "Post atualizado e salvo como rascunho com sucesso"]);
    }

    public function deletar($id) {
        PostEstatisticas::where("idpost", $id)->delete();
        Post::destroy($id);
        return response($id, HTTP::OK);
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
            $posts = Post::where("idsituacao", Parametros::SITUACAOPOST_AGENDADO)->get();
        else
            $posts = Post::where("idsituacao", Parametros::SITUACAOPOST_AGENDADO)->where("idperfil", Auth::id())->get();

        if ($request->has("campo") && $request->has("filtro")) {
            if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", Parametros::SITUACAOPOST_AGENDADO)->get();
            else
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", Parametros::SITUACAOPOST_AGENDADO)->where("idperfil", Auth::id())->get();
        }
        return view("painel.post.agendados", ["pagina" => "posts"], ["subpagina" => "agendados"])->with("posts", $posts);
    }

    public function listarRascunhos(Request $request) {
        $posts = null;

        if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
            $posts = Post::where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->get();
        else
            $posts = Post::where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->where("idperfil", Auth::id())->get();


        if ($request->has("campo") && $request->has("filtro")) {
            if (PerfilHelper::ehAdministrador(Auth::user()->idgrupo))
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->get();
            else
                $posts = Post::where($request->campo, "like", $request->filtro)->where("idsituacao", Parametros::SITUACAOPOST_RASCUNHO)->where("idperfil", Auth::id())->get();
        }
        return view("painel.post.rascunhos", ["pagina" => "posts"], ["subpagina" => "rascunhos"])->with("posts", $posts);
    }

    public function preVisualizar($situacao, $slug) {
        return $this->blogandoController->visualizarPost($slug, $situacao, "pre-visualizar", "preVisualizar");
    }

    public function publicar(Request $request) {
        $this->atualizarPost($request, Parametros::SITUACAOPOST_PUBLICADO, false);
        $this->emailController->newPostToNewsletter(Post::find($request->id));
        return redirect()->action("PostController@editar", ["id" => $request->id])->withInput(["sucesso" => "Post publicado com sucesso"]);
    }

    public function salvar(Request $request) {
        $post = $this->criarPost($request, Parametros::SITUACAOPOST_EMANDAMENTO);
        return redirect()->action("PostController@editar", ["id" => $post])->withInput(["sucesso" => "Post salvo com sucesso"]);
    }

    public function salvarRascunho(Request $request) {
        $post = $this->criarPost($request, Parametros::SITUACAOPOST_RASCUNHO);
        return redirect()->action("PostController@editar", ["id" => $post])->withInput(["sucesso" => "Post salvo como rascunho com sucesso"]);
    }

    private function criarPost($request, $situacao) {
        $post = Post::create([
            "idperfil" => Auth::id(),
            "idsituacao" => $situacao,
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
        return $post;
    }

    private function atualizarPost($request, $situacao, $verificarSituacao = true) {
        Post::where("id", $request->id)
            ->update([
                "idsituacao" => $this->verificarSituacao($situacao, $verificarSituacao),
                "titulo" => $request->titulo,
                "slug" => str_slug($request->titulo),
                "imagem" => $this->subindoImagem($request),
                "conteudo" => $request->conteudo,
                "conteudohtml" => $this->blog->parametros->usarmarkdown ? $this->markdownParaHtml($request->conteudo) : $request->conteudo,
                "conteudomarkdown" => $this->blog->parametros->usarmarkdown ? $request->conteudo : $this->htmlParaMarkdown($request->conteudo),
                "conteudoresumido" => $this->blog->parametros->usarmarkdown ? substr(strip_tags($this->markdownParaHtml($request->conteudo)), 0, 255) : substr(strip_tags($request->conteudo), 0, 255),
                "datapostagem" => $situacao === Parametros::SITUACAOPOST_PUBLICADO ? date("Y-m-d H:i:s") : $request->datapostagem,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
    }

    private function htmlParaMarkdown($string) {
        $converter = new HtmlConverter(array("header_style" => "atx"));
        return $converter->convert($string);
    }

    private function markdownParaHtml($string) {
        $parsedown = new Parsedown();
        return $parsedown->text($string);
    }

    private function verificarSituacao($situacao, $ehParaVerificar = true) {
        if ($ehParaVerificar) {
            if ($situacao == Parametros::SITUACAOPOST_RASCUNHO)
                return Parametros::SITUACAOPOST_EMANDAMENTO;
        }
        return $situacao;
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
