<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Studentinfo;

class StudentApprovalRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $student;

    public function __construct(Studentinfo $student)
    {
        $this->student = $student;
    }
    public function build()
    {
        return $this->view('emails.student_approval_request');
    }
}
