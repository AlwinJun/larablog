<x-layout>
    @include('posts._posts-header')
    <main class="mx-auto mt-6 max-w-6xl space-y-6 lg:mt-20">
        @if ($posts->count())
            <x-post-featured-card :post='$posts[0]' />

            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach ($posts->skip(1) as $post)
                        <x-post-card :post='$post'
                            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
                    @endforeach
                </div>
                {{ $posts->links() }}
            @endif
        @else
            <p class="text-center">No post yet,come back later.</p>
        @endif

    </main>
</x-layout>
