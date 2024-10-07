<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CandidatureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $offre;
    public $user;
    public $contenu;

    /**
     * Create a new message instance.
     *
     * @param  $offre  The job offer
     * @param  $contenu  The application message content
     * @param  $user  The user who applied
     */
    public function __construct($offre, $contenu, $user)
    {
        $this->offre = $offre;
        $this->contenu = $contenu;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Candidature pour votre offre: ' . $this->offre->titre,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'offre.postuler',
            with: [
                'user' => $this->user,
                'contenu' => $this->contenu,
                'offre' => $this->offre,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
