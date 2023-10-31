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

    <!-- resources/views/posts/index.blade.php -->
    <h1>All Posts</h1>
    <p>
        <a href="{{ url('/posts/create') }}">Blog</a>
    </p>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th class="col">Title</th>
                <th class="col">Content</th>
                <th class="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</body>

</html>