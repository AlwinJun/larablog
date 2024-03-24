@auth
    <form action="/post/{{ $post->slug }}/comments" method="post" class="panel-border pb-0">
        @csrf
        <div class="mb-4 flex items-start gap-4 font-semibold">
            <div>
                <img src="https://i.pravatar.cc/70?u={{ auth()->id() }}" alt="profile picture" class="rounded-xl">
            </div>
            <textarea name="body" class="overflow-au h-16 w-full resize-none rounded-xl focus:h-24"
                placeholder="Share your thoughts" required></textarea>
            @error('body')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-2 flex justify-end">
            <button type="submit"
                class="rounded-full bg-blue-500 px-4 py-2 text-xs font-semibold uppercase text-white">Comment
            </button>
        </div>
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
