<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailNewNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $blog;
    public $email;

    public function __construct($email, $blog) {
        $this->email = $email;
        $this->blog = $blog;
    }

    public function build() {
        return $this->from(env("MAIL_USERNAME"))
            ->subject("[Novo Assinante] " . $this->email)
            ->view("temas." . $this->blog->aparencia->temablog .  ".email.new-newsletter");
    }

}
