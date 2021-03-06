<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
 
class ReminderEmailDigest extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $reminders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reminders)
    {
        $this->reminders = $reminders;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reminder-digest')
                    ->from('prm@rappoortooze.com')
                    ->with('reminders', $this->reminders);
    }
}
