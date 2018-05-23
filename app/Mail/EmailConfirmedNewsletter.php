<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailConfirmedNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $blog;

    public function __construct($email, $blog) {
        $this->email = $email;
        $this->blog = $blog;
    }

    public function build() {
        return $this->from(env("MAIL_USERNAME"))
            ->subject("[Assinante Confirmado] " . $this->email)
            ->view("temas." . $this->blog->aparencia->temablog .  ".email.confirmed-newsletter");
    }

}
