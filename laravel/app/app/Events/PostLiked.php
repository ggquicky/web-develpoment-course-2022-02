<?php

namespace App\Events;

use App\Models\Post;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostLiked implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(private Post $post, private User $user)
    {
    }

    public function broadcastOn()
    {
        return new Channel('posts.likes');
    }

    public function broadcastWith(): array
    {
        $this->post->load('likes.user');
        $this->post->loadCount('likes');

        return [
            'post' => $this->post,
            'user' => $this->user,
        ];
    }
}
