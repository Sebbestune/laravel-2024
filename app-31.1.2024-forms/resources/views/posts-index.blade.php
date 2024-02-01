<!DOCTYPE html>
<html>
<head>
    <title>All posts</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-xl font-bold underline">Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }}:
            {{ $post->description }}</li>
        @endforeach
    </ul>
</body>