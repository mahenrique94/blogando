<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPostNewsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $blog;

    public function __construct($post, $blog) {
        $this->post = $post;
        $this->blog = $blog;
    }

    public function build() {
        return $this->from(env("MAIL_USERNAME"))
            ->subject("[Novo Post] " . $this->post->titulo)
            ->view("temas." . $this->blog->aparencia->temablog .  ".email.post-newsletter");
    }
}
