<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\HTTP;
use Illuminate\Http\Request;
use App\BlogNewsletter;

class BlogNewsletterController extends Controller implements GenericoController
{

    private $emailController;
    private $blog;

    public function __construct(EmailController $emailController) {
        $this->emailController = $emailController;
        $this->blog = Blog::first();
    }

    public function assinar(Request $request) {
        BlogNewsletter::create([
            "email" => $request->email,
            "inativo" => true,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        $this->emailController->newNewsletter($request->email);
        return response("Obrigado por assinar nossa newsletter", HTTP::OK);
    }

    public function atualizar(Request $request) {
        BlogNewsletter::where("id", $request->id)
            ->update([
                "nome" => $request->nome,
                "email" => $request->email,
                "acompanharposts" => $request->acompanharposts,
                "acompanharcomentarios" => $request->acompanharcomentarios,
                "acompanharrespostas" => $request->acompanharrespostas,
                "inativo" => $request->inativo,
                "updated_at" => date("Y-m-d H:i:s"),
            ]);
        return redirect()->action("BlogNewsletterController@listar")->withInput(["sucesso" => "Newsletter atualizada com sucesso"]);
    }

    public function confirmar($hash) {
        $email = decrypt($hash);
        BlogNewsletter::where("email", $email)
            ->update([ "inativo" => false ]);
        $this->emailController->confirmedNewsletter($email);
        return view("temas." . $this->blog->aparencia->temablog .  ".email-confirmado");
    }

    public function deletar($id) {
        BlogNewsletter::destroy($id);
        return response($id, HTTP::OK);
    }

    public function editar($id) {
        return view("painel.blogNewsletter.formulario", ["pagina" => "newsletter", "subpagina" => "newsletter"])->with("newsletter", BlogNewsletter::find($id));
    }

    public function formulario() {
        return view("painel.blogNewsletter.formulario", ["pagina" => "newsletter", "subpagina" => "newsletter"])->with("newsletter", new BlogNewsletter());
    }

    public function json() {
        return response()->json(BlogNewsletter::all());
    }

    public function listar(Request $request) {
        $newsletter = BlogNewsletter::all();
        if ($request->has("campo") && $request->has("filtro")) {
            $newsletter = BlogNewsletter::where($request->campo, "like", $request->filtro)->get();
        }
        return view("painel.blogNewsletter.lista", ["pagina" => "newsletter", "subpagina" => "newsletter"])->with("newsletter", $newsletter);
    }

    public function salvar(Request $request) {
        BlogNewsletter::create([
            "nome" => $request->nome,
            "email" => $request->email,
            "acompanharposts" => $request->acompanharposts,
            "acompanharcomentarios" => $request->acompanharcomentarios,
            "acompanharrespostas" => $request->acompanharrespostas,
            "inativo" => $request->inativo,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        ]);
        return redirect()->action("BlogNewsletterController@listar")->withInput(["sucesso" => "Newsletter salva com sucesso"]);
    }
}
