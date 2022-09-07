<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $data;

    public function __construct($email,$data)
    {
        $this->email = $email;
        $this->data = $data;
    }

    public function build()
    {
      
        return $this->from('phong12t2@gmail.com')->markdown('emails.order');
    }
}
