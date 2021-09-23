<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailToUser extends Mailable
{
    use Queueable, SerializesModels;
    protected $inputs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nahidhp2@gmail.com', 'Test Mail')
            ->subject('Greetings')
            ->markdown('email.how_are_you')
            ->with('name', $this->inputs);



//        return $this->view('view.name');
    }
}
