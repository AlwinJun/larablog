<header class="mx-auto mt-20 max-w-xl text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-bg-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="mt-2 inline-flex">By Lary Laracore <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>

    <p class="mt-14 text-sm">
        Another year. Another update. We're refreshing the popular Laravel series with new content.
        I'm going to keep you guys up to speed with what's going on!
    </p>

    <div class="mt-8 space-y-2 lg:space-x-4 lg:space-y-0">
        <!--  Category -->
        <x-category-dropdown />

        <!-- Other Filters -->
        {{-- <div class="relative flex items-center rounded-xl bg-gray-100 lg:inline-flex">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                <option value="category" disabled selected>Other Filters
                </option>
                <option value="foo">Foo
                </option>
                <option value="bar">Bar
                </option>
            </select>

            <svg class="pointer-events-none absolute -rotate-90 transform" style="right: 12px;" width="22"
                height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
        </div> --}}
        <!-- Search -->
        {{-- @dd(request()) --}}
        <div class="relative flex items-center rounded-xl bg-gray-100 px-3 py-2 lg:inline-flex">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}"
                    class="bg-transparent text-sm font-semibold placeholder-black">
            </form>
        </div>
    </div>
</header>
