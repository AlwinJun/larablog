<x-layout>
    <main>
        <article>
            <h2>
                {{ $post->title }}
            </h2>
            <p> {!! $post->body !!}</p>
        </article>
        <a href="/">Go back</a>
    </main>
</x-layout>
