<header class="mx-auto mt-20 max-w-xl text-center">
    <h1 class="text-4xl">
        LaraBlog: <span class="text-blue-500">Unleashing Ideas</span>
    </h1>

    <p class="mt-14 text-sm">
        Dive into the world of Larablog, where every post is a journey. Explore diverse perspectives, engage with
        vibrant discussions, and let your thoughts soar. Your adventure into insightful storytelling starts here
    </p>

    <div class="mt-8 space-y-2 lg:space-x-4 lg:space-y-0">
        <!--  Category -->
        <x-category-dropdown />


        <!-- Search -->
        {{-- @dd(request()) --}}
        <div class="relative flex items-center rounded-xl bg-gray-100 px-3 py-2 lg:inline-flex">
            <form method="GET" action="{{ route('home') }}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}"
                    class="bg-transparent text-sm font-semibold placeholder-black">
            </form>
        </div>
    </div>
</header>
