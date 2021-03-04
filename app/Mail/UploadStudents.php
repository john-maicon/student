<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UploadStudents extends Mailable
{
     use Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $this->subject('Planilha de alunos');
        $this->to($this->user->email, $this->user->name);
        return $this->markdown('mail.uploadStudents',[
            'user' => $this->user,
        ]);
    }
}
