<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\MessageModel;

class Test extends Mailable
{
    use Queueable, SerializesModels;

   

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $message;
    public function __construct($message)
    {
        $this->message=$message;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.test')->with(['message'=>$this->message]);
    }
}
