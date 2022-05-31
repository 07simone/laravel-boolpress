<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $nome;
    protected $email;
    protected $guestMessage;
    /**
     * Create a new guestMessage instance.
     *
     * @return void
     */
    public function __construct($nome, $email, $guestMessage)

    {
        $this->nome = $nome;
        $this->email = $email;
        $this->guestMessage = $guestMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->email)->view('email.body',["nome"=>$this->nome, "email"=>$this->email, "guestMessage"=>$this->guestMessage]); /* $this->replyTo($this->email) = a quale email devo andare a rispondere quando faccio rispondi */
    }
}
