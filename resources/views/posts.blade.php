<x-layout>
    <main>
        @foreach ($posts as $post)
            <article>
                <h2>
                    <a href="/post/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <span>
                    <span>
                        By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                    </span>
                    <a href="/categories/{{ $post->category->slug }}" class="category">#{{ $post->category->name }}</a>
                </span>
                <p>{{ $post->exerpt }}</p>
            </article>
        @endforeach
    </main>
</x-layout>
