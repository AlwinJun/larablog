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
        <article>
            <h2>
                <?= $post->title ?>
            </h2>
            <p><?= $post->body ?></p>
        </article>
        <a href="/">Go back</a>
    </main>
</body>

</html>
