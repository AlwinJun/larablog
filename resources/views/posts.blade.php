<x-layout>
    <main>
        @foreach ($posts as $post)
            <article>
                <h2>
                    <a href="/post/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h2>
                <a href="/categories/{{ $post->category->slug }}" class="category">#{{ $post->category->name }}</a>
                <p>{{ $post->exerpt }}</p>
            </article>
        @endforeach
    </main>
</x-layout>
