<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerSheetAssignedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $answerSheetId;
    public $studentName;
    public $studentEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($answerSheetId,$studentName,$studentEmail)
    {
        $this->answerSheetId = $answerSheetId;
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
        $this->subject('New Answer Sheet Assigned')
                    ->view('emails.answer_sheet_assigned')
                    ->with([
                        'answerSheetId' => $this->answerSheetId,
                        'studentName' => $this->studentName,
                        'studentEmail' => $this->studentEmail,
                    ]);
    
    }
}
