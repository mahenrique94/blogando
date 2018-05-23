<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailConfirmNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $hash;
    public $blog;

    public function __construct($hash, $blog) {
        $this->hash = $hash;
        $this->blog = $blog;
    }

    public function build() {
        return $this->from(env("MAIL_USERNAME"))
            ->subject("[Confirmar Inscrição] " . $this->blog->titulo)
            ->view("temas." . $this->blog->aparencia->temablog .  ".email.confirm-newsletter");
    }

}
