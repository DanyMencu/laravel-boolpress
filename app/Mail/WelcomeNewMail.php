<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeNewMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $date_time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $date_time)
    {
        $this->name = $name;
        $this->date_time = $date_time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.welcome')
                    ->with([
                        'name' => $this->name,
                        'date_time' => $this->date_time,
                    ]);
    }
}
