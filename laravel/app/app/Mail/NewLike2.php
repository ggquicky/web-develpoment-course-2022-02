<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLike2 extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(private User $user, private Post $post)
    {
    }

    public function build()
    {
        return $this->markdown('mails.new-like2')
            ->with(
                [
                    'post' => $this->post,
                    'user' => $this->user,
                ]
            );
    }
}
