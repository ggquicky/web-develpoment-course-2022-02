<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLike extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(private User $user)
    {
    }

    public function build()
    {
        return $this->view('mails.new-like')
            ->with(
                [
                    'user' => $this->user,
                ]
            );
    }
}
