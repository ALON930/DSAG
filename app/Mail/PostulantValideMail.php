<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Postulant;

class PostulantValideMail extends Mailable
{
    use Queueable, SerializesModels;

    public $postulant;

    /**
     * Crée une nouvelle instance du message.
     */
    public function __construct(Postulant $postulant)
    {
        $this->postulant = $postulant;
    }

    /**
     * Définir l’enveloppe du message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation de votre inscription'
        );
    }

    /**
     * Définir le contenu du message.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.postulant.valide'
        );
    }

    /**
     * Pièces jointes éventuelles.
     */
    public function attachments(): array
    {
        return [];
    }
}