<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DoubtRaisedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $description;
    public $doubtFilePath;
    public $studentName;
    public $studentEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($description,$doubtFilePath,$studentName,$studentEmail)
    {
        //
        $this->description = $description;
        $this->doubtFilePath = $doubtFilePath;
        $this->studentName = $studentName;
        $this->studentEmail = $studentEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject('New Doubt Submitted by Student')
                    ->view('emails.doubt_raised')
                    ->with([
                        'studentName' => $this->studentName,
                        'studentEmail' => $this->studentEmail,
                    ]);

        // if ($this->doubtFilePath) {
        //     $mail->attach(public_path($this->doubtFilePath));
        // }

        return $mail;
    }
}
