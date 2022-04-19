<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
        $posts = Post::query()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $path = $request->file('image')->store('images', 'public');

        $post = $user->posts()->create(
            [
                'body' => $request->input('body'),
                'image_path' => sprintf(
                    "/storage/%s",
                    $path
                ),
                'title' => $request->input('title'),
            ]
        );

        broadcast(
            new PostCreated($post)
        );

        return redirect()->action(
            [PostController::class, 'show'],
            ['post' => $post->id]
        );
    }

    public function show(Post $post)
    {
        $like = $post->likes->firstWhere('user_id', Auth::id());

        return view('posts.show', compact('like', 'post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->to('/');
    }
}
