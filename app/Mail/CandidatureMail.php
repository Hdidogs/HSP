<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidatureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $messageContent;
    public $offre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $messageContent, $offre)
    {
        $this->user = $user;
        $this->messageContent = $messageContent;
        $this->offre = $offre;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle candidature pour ' . $this->offre->titre)
            ->view('emails.candidature');
    }
}
