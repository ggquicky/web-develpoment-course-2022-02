<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLike3 extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private User $user, private Post $post)
    {
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail(User $notifiable)
    {
        return (new MailMessage)
            ->error()
            ->line("{$this->user->name} le dio like a tu post.")
            ->action(
                'Notification Action',
                route('posts.show', ['post' => $this->post->id])
            )
            ->line('que onda')
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
        ];
    }
}
