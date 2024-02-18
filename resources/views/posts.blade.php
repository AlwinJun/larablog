<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/index.css">

    <title>Document</title>
</head>

<body>
    <main>
        @foreach ($posts as $post)
            <article>
                <h2>
                    <a href="post/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <p>{{ $post->exerpt }}</p>
            </article>
        @endforeach
    </main>
</body>

</html>
