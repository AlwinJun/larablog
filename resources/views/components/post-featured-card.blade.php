@props(['post'])

<article
    class="rounded-xl border border-black border-opacity-0 transition-colors duration-300 hover:border-opacity-5 hover:bg-gray-100">
    <div class="px-5 py-6 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset("storage/{$post->thumbnail}") }}" alt="Blog Post illustration"
                class="h-[300px] w-full rounded-xl">
        </div>

        <div class="flex flex-1 flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-label :category="$post->category" />

                </div>

                <div class="mt-4">
                    <a href="{{ route('post.show', ['post' => $post->slug]) }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>

                    <span class="mt-2 block text-xs text-gray-400">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="mt-4 space-y-2 text-sm">
                {!! $post->exerpt !!}
            </div>

            <footer class="mt-8 flex items-center justify-between">
                <div class="flex items-center text-sm">
                    <img src="https://i.pravatar.cc/70?u={{ $post->author->id }}" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="{{ route('home', ['author' => $post->author->username]) }}">
                            <h5 class="font-bold"> {{ $post->author->name }} </h5>
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="{{ route('post.show', ['post' => $post->slug]) }}"
                        class="rounded-full bg-gray-200 px-8 py-2 text-xs font-semibold transition-colors duration-300 hover:bg-gray-300">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
