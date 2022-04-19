<h1>Post {{ $post->id }} has
    <span class="likes-count">{{ $post->likes->count() }}</span>
    likes
</h1>

<form
    action="{{
        $like
            ? route('posts.likes.destroy', ['like' => $like->id, 'post' => $post->id])
            : route('posts.likes.store', ['post' => $post->id])
    }}"
    method="post"
>
    @csrf

    @if($like)
        @method('DELETE')
        <button type="submit">Dislike</button>
    @else
        <button type="submit">Like</button>
    @endif
</form>
@can('delete', $post)
<form
    action="{{ route('posts.destroy', ['post' => $post->id]) }}"
    method="post"
>
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
@endcan

<img height="200" src="{{ $post->image_path }}" />

<br>
<ul>
    @foreach($post->likes as $like)
        <li>{{ $like->user->name }}</li>
    @endforeach
</ul>

<script src="/js/app.js"></script>
<script>
    window.Echo.channel('posts.likes')
        .listen('PostLiked', ({post, user}) => {
            const countEl = document.querySelector(`.likes-count`)

            countEl.textContent = post.likes_count
        })
</script>
