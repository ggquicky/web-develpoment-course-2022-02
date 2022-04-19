<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="/js/app.js"></script>
</head>

<body>
<h1>Posts</h1>
<br>
@foreach($posts as $post)
    <div data-post-id="{{ $post->id }}">
        <h3>{{ $post->title }} --- <span>{{ $post->likes->count() }}</span></h3>
    </div>
@endforeach

{{ $posts->links() }}
</body>
</html>
