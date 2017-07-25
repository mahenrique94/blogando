<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Parsedown;
use League\HTMLToMarkdown\HtmlConverter;

class PostController extends Controller
{
    public function atualizar(Request $request) {
        Post::where("id", $request->input("id"))
            ->update([
                "idautor" => 1,
                "idsituacao" => 1,
                "titulo" => $request->titulo, 
                "slug" => str_slug($request->titulo), 
                "imagem" => $this->subindoImagem($request),
                "conteudo" => $request->conteudo, 
                "conteudohtml" => $request->conteudo, 
                "conteudomarkdown" => $this->htmlParaMarkdown($request->conteudo), 
                "conteudoresumido" => substr(strip_tags($request->conteudo), 0, 255), 
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("PostController@listar")->withInput(["sucesso" => "Post atualizado com sucesso"]);
    }

    public function deletar($id) {
        Post::destroy($id);
        return response($id, 200);
    }

    public function editar($id) {
        return view("painel.post.formulario", ["pagina" => "posts", "subpagina" => "novo"])->with("post", Post::find($id));
    }

    public function formulario() {
        return view("painel.Post.formulario", ["pagina" => "posts", "subpagina" => "novo"])->with("post", new Post());
    }

    public function json() {
        return response()->json(Post::all());
    }
    
    public function listar(Request $request) {
        $posts = Post::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $posts = Post::where($request->input("campo"), "like", $request->input("filtro"))->get();
        }
        return view("painel.post.lista", ["pagina" => "posts"], ["subpagina" => "todos"])->with("posts", $posts);
    }

    public function salvar(Request $request) {
        Post::create([
            "idautor" => 1,
            "idsituacao" => 1,
            "titulo" => $request->titulo, 
            "slug" => str_slug($request->titulo), 
            "imagem" => $this->subindoImagem($request),
            "conteudo" => $request->conteudo, 
            "conteudohtml" => $request->conteudo, 
            "conteudomarkdown" => $this->htmlParaMarkdown($request->conteudo), 
            "conteudoresumido" => substr(strip_tags($request->conteudo), 0, 255), 
            "datapostagem" => date("Y-m-d H:i:s"),
            "created_at" => date("Y-m-d H:i:s"), 
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("PostController@listar")->withInput(["sucesso" => "Post salvo com sucesso"]);
    }

    private function htmlParaMarkdown($string) {
        $converter = new HtmlConverter(array("header_style"=>"atx"));
        return $converter->convert($string);
    }

    private function markdownParaHtml($string) {
        $parsedown = new Parsedown();
        return $parsedown->text($string);
    }

    private function subindoImagem($request) {        
        if ($request->hasFile("file") && $request->file->isValid()) {
            $imagem = str_slug($request->input("titulo")) . ".jpg";
            $request->file->move("/Arquivo/Upload/blogando", $imagem);
            return $imagem;
        }
        if (!is_null($request->input("imagem")))
            return $request->input("imagem");
        return null;
    }
}
