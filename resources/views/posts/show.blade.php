<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <!-- resources/views/posts/show.blade.php -->
    <h1>{{ $post->title }}</h1>

    <p>{{ $post->content }}</p>

    <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to all posts</a>
</body>

</html>