<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Invitation;

class InviteCreated extends Mailable
{
    use Queueable, SerializesModels;


    public $invitation;

    public function __construct(Invitation $invitation)
    {
         $this->invitation = $invitation;
    }


    public function build()
    {

        return $this->from('zaiouanyassin@gmail.com')
                ->view('emails.invite');
    }
}
