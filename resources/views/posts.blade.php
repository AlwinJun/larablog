<x-layout>
    @include('/partials/_posts-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>


    {{-- <main>
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
    </main> --}}
</x-layout>
