<x-layout>
    <main>
        <article>
            <h2>
                {{ $post->title }}
            </h2>
            <span>
                <span>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }} </a>
                </span>
                <a href="/categories/{{ $post->category->slug }}" class="category"> #{{ $post->category->name }}</a>
            </span>

            <div> {!! $post->body !!}</div>
        </article>
        <a href="/">Go back</a>
    </main>
</x-layout>
