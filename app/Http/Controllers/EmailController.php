<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;
use App\Blog;

class EmailController extends Controller {

    private $blog;

    public function __construct() {
        $this->blog = Blog::first();
    }

    public function enviar(Request $request) {
        Mail::to("contato@playpix.com.br")->send(new Email($request->all()));
        return redirect()->action("BlogandoController@contato")->withInput(["mensagem" => "Obrigado pelo contato, seu email foi enviado com sucesso."]);
    }

    public function template() {
        return view("temas." . $this->blog->aparencia->temablog .  ".template");
    }

}
