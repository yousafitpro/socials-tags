<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class messageEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $content="";
    public $subject="";
    public $fromMail="";
    public $attachment=null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromMail,$subject,$content,$attachment)
    {
        $this->content=$content;
        $this->subject=$subject;
        $this->fromMail=$fromMail;
        $this->attachment=$attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail= $this->from($this->fromMail)->subject($this->subject)->view('emails.compose');
        if ($this->attachment!=null && !empty($this->attachment)){


                    $mail->attach($this->attachment);

        }
        return $mail;
    }

}
