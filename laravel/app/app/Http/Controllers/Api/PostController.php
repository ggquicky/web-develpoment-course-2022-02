<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        $token = $user->createToken('Test', ['post_create', 'post_update']);

        return [
            'token' => $token->plainTextToken,
        ];

        $posts = Post::query()->paginate();

        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
