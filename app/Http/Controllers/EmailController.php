<?php

namespace App\Http\Controllers;

use App\Mail\EmailConfirmedNewsletter;
use App\Mail\EmailConfirmNewsletter;
use App\Mail\EmailNewNewsletter;
use App\Mail\EmailPostNewsletter;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Blog;
use App\Post;
use App\BlogNewsletter;

class EmailController extends Controller {

    private $blog;

    public function __construct() {
        $this->blog = Blog::first();
    }

    public function newNewsletter($email) {
        Mail::to(env("MAIL_USERNAME"))->send(new EmailNewNewsletter($email, $this->blog));
        Mail::to($email)->send(new EmailConfirmNewsletter($this->hash($email), $this->blog));
    }

    public function confirmedNewsletter($email) {
        Mail::to(env("MAIL_USERNAME"))->send(new EmailConfirmedNewsletter($email, $this->blog));
    }

    public function newPostToNewsletter($post) {
        Mail::to(env("MAIL_USERNAME"))
            ->bcc(BlogNewsletter::where("inativo", false)->where("acompanharposts", true)->get())
            ->send(new EmailPostNewsletter($post, $this->blog));
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
            if ($view === "new-newsletter") {
                return view("temas." . $this->blog->aparencia->temablog .  ".email." . $view)->with("email", env("MAIL_USERNAME"));
            }
            if ($view === "confirm-newsletter") {
                return view("temas." . $this->blog->aparencia->temablog .  ".email." . $view)->with("hash", $this->hash());
            }
            if ($view === "confirmed-newsletter") {
                return view("temas." . $this->blog->aparencia->temablog .  ".email." . $view)->with("email", "teste@teste.com");
            }
        }
        return response("Página não encontrada", 404);
    }

    private function hash($email = "teste@teste.com") {
        return encrypt($email);
    }

}
