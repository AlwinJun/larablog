<x-layout>


    <main class="mx-auto mt-10 max-w-6xl space-y-6 lg:mt-20">
        <article class="mx-auto max-w-4xl gap-x-10 lg:grid lg:grid-cols-12">
            <div class="col-span-4 mb-10 lg:pt-14 lg:text-center">
                <img src="{{ asset("storage/{$post->thumbnail}") }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-xs text-gray-400">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="mt-4 flex items-center text-sm lg:justify-center">
                    <img src="https://i.pravatar.cc/70?u={{ $post->author->id }}" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <a href="{{ route('home', ['author' => $post->author->username]) }}">
                            <h5 class="font-bold">{{ $post->author->name }} </h5>
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="mb-6 hidden justify-between lg:flex">
                    <a href="{{ route('home') }}"
                        class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Posts
                    </a>

                    <x-category-label :category="$post->category" />
                </div>

                <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                    {{ $post->title }}
                </h1>

                <div class="space-y-4 leading-loose lg:text-lg">
                    {!! $post->body !!}
                </div>
            </div>
            <section class="col-span-8 col-start-5 mt-8 space-y-4">
                @include('posts._add-comment-form')

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach
            </section>
        </article>

    </main>


</x-layout>
