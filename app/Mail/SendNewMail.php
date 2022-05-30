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
    protected $messaggio;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $email, $messaggio)

    {
        $this->nome = $nome;
        $this->email = $email;
        $this->messaggio = $messaggio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->replyTo($this->email)->view('email.body',["nome"=>$this->nome, "email"=>$this->email, "messaggio"=>$this->messaggio]); /* $this->replyTo($this->email) = a quale email devo andare a rispondere quando faccio rispondi */
    }
}
