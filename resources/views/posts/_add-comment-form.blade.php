@auth
    <form action="/post/{{ $post->slug }}/comments" method="post" class="panel-border pb-0">
        @csrf
        <div class="mb-4 flex items-start gap-4 font-semibold">
            <div>
                <img src="https://i.pravatar.cc/70?u={{ auth()->id() }}" alt="profile picture" class="rounded-xl">
            </div>
            <textarea name="body" class="overflow-au h-16 w-full resize-none rounded-xl focus:h-24"
                placeholder="Share your thoughts" required></textarea>

            <x-form.error name="body" />
        </div>

        <x-form.button>Comment</x-form.button>
    </form>
@else
    <div>
        <hr>
        <p class="mx-auto -mt-3 w-fit bg-white px-3 text-center">
            <a href="/register" class="text-blue-500">Register</a> or
            <a href="/login" class="text-blue-500">Login</a> to join discussions!
        </p>
    </div>
@endauth
