<x-layout>
    <main>
        <article>
            <h2>
                {{ $post->title }}
            </h2>
            <a href="#" class="category">#{{ $post->category->name }}</a>

            <div> {!! $post->body !!}</div>
        </article>
        <a href="/">Go back</a>
    </main>
</x-layout>
