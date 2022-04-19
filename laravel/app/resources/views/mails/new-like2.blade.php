@component('mail::message')
# New Like

{{ $user->name }} le dio like a tu post.

@component('mail::button', ['url' => route('posts.show', ['post' => $post->id])])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
