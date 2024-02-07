<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class AdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public $user;

public function __construct(User $user)
{
    $this->user = $user;
}
     public function build()
    {
        return $this->subject('New User Registration')->view('emails.admin_notification');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
}
