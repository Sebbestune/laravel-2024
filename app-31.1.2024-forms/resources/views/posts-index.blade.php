<!DOCTYPE html>
<html>
<head>
    <title>All posts</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-xl font-bold underline">Posts</h1>
    <article>
        @foreach ($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <form method="post" action="{{route('post-add-comment')}}">
                @csrf
                <label for="comment">New comment: </label>
                <input type="text" id="comment" name="comment">
                <input type="hidden" name="postid" value="{{$post->id}}">
                <input type="submit" value="submit">
            </form>
            <ul>
            @foreach ($post->comments as $comment)
                <li>{{ $comment->comment }}</li>
            @endforeach
            </ul>
        @endforeach
    </article>
</body>