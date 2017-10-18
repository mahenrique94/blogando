<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Email extends Mailable {

    use Queueable, SerializesModels;

    public $nome;
    public $email;
    public $telefone;
    public $celular;
    public $assunto;
    public $mensagem;
    public $view;

    public function __construct($data) {
        $this->nome = $data["nome"];
        $this->email = $data["email"];
        $this->telefone = $data["telefone"];
        $this->celular = $data["celular"];
        $this->assunto = $data["assunto"];
        $this->mensagem = $data["mensagem"];
        $this->view = $data["view"];
    }

    public function build() {
        return $this->from($this->email)
            ->subject($this->nome . " - Novo contato realizado no seu site")
            ->view($this->view);

    }
}
