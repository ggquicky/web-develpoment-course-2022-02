<h1>Create Post</h1>

<form
    action="{{ route('posts.store') }}"
    enctype="multipart/form-data"
    method="post"
>
    @csrf

    <input name="title" type="text" />
    @error('title')
        <div>{{ $errors->first('title') }}</div>
    @enderror
    <br>
    <textarea name="body">{{ old('body') }}</textarea>
    @error('body')
        <div>{{ $errors->first('body') }}</div>
    @enderror
    <br>
    <input name="image" type="file" />
    @error('image')
        <div>{{ $errors->first('image') }}</div>
    @enderror
    <br>
    <button type="submit">Create</button>
</form>
