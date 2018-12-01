<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class TestMailable extends Mailable
{
  use Queueable, SerializesModels;

  public $dataEmail;

  /**
   * Create a new email message
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->dataEmail = $data;
  }

  /**
   * Build the Message.
   *
   * @return void
   */
  public function build()
  {
    return $this->markdown('email.TestMail.MessageMail')->with('message', $this->dataEmail);
  }
}
