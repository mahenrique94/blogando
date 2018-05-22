<?php

namespace App\Http\Controllers;

use App\Mail\EmailPostNewsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Blog;
use App\Post;

class EmailController extends Controller {

    private $blog;

    public function __construct() {
        $this->blog = Blog::first();
    }

    public function newPostToNewsletter($post) {
        Mail::to(env("MAIL_USERNAME"))->send(new EmailPostNewsletter($post, $this->blog));
    }

    public function enviar(Request $request) {
        Mail::to(env("MAIL_USERNAME"))->send(new Email($request->all()));
        return redirect()->action("BlogandoController@contato")->withInput(["mensagem" => "Obrigado pelo contato, seu email foi enviado com sucesso."]);
    }

    public function template(Request $request) {
        $view = $request->query("view");
        if (!empty($view) && !is_null($view)) {
            if ($view === "post-newsletter") {
                return view("temas." . $this->blog->aparencia->temablog .  ".email." . $view)->with("post", Post::latest()->first());
            }
        }
        return response("Página não encontrada", 404);
    }

}
