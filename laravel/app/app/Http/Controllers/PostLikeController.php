<?php

namespace App\Http\Controllers;

use App\Events\PostLiked;
use App\Mail\NewLike;
use App\Mail\NewLike2;
use App\Models\Like;
use App\Models\Post;
use App\Notifications\NewLike3;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
{
    public function store(Post $post)
    {
        $post->likes()->create(
            [
                'user_id' => Auth::id(),
            ]
        );

        broadcast(
            new PostLiked($post, Auth::user())
        );

//        $post->user->notify(
//            new NewLike3(Auth::user(), $post)
//        );

        return back();
    }

    public function destroy(Post $post, Like $like)
    {
        $like->delete();

        broadcast(
            new PostLiked($post, Auth::user())
        );

        return back();
    }
}
