<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    private $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            //Blade
/*          return $this->view('mails.contact')
                    ->with([
                        'contact' => $this->contact
                    ]); */

            //Markdown
            return $this->markdown('mails.contact-mark')
                        ->with([
                            'contact' => $this->contact
                        ]);
    }
}
