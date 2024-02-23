<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class ContactMessageReply extends Mailable
{
    use Queueable, SerializesModels;

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('support@clickspark.site', 'ClickSpark Support'),
            
        );
    }

    public $replyContent; // Variable to store the reply content

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replyContent)
    {
        $this->replyContent = $replyContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reply to Your Contact Message')
                    ->markdown('admin.emails.reply')
                    ->with([
                        'replyContent' => $this->replyContent,
                        'supportName' => config('mail.reply_to.name'),
                    ]);
    }
}
