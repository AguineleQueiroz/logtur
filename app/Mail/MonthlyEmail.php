<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class MonthlyEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $sender_name;
    public $sender_email;
    public $title;
    public $body;
    /**
     * Create a new message instance.
     */
    public function __construct(Client $client, string $sender_name, string $sender_email, string $title, string $body) {
        $this->client = $client;
        $this->sender_name = $sender_name;
        $this->sender_email = $sender_email;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            from: new Address($this->sender_email, $this->sender_name),
            to: [
                $this->client->email,
            ],
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            markdown: 'mails.monthly_email',
            with: ['client' => $this->client,
                'title' => $this->title,
                'content' => $this->body
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
