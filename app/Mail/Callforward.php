<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Callforward extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->details['type'] == 'voicemail'){
            return $this->subject('New Voicemail Call from '.$this->details['f_name'].' ')
            ->from('support@notetakerpro.com', 'Support Notetakerpro')
            ->cc(['support@notetakerpro.com'])
            ->view('mail.callForward');
        }else{
            return $this->subject('New Missed Call from '.$this->details['f_name'].' ')
            ->from('support@notetakerpro.com', 'Support Notetakerpro')
            ->cc(['support@notetakerpro.com'])
            ->view('mail.callForward');
        }
        
        //return $this->view('view.name');
    }
}
