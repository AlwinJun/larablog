<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <title>Larablog</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:items-center md:justify-between">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 flex items-center md:mt-0">
                {{-- Show only if user is login --}}
                @auth
                    <div class="relative flex items-center gap-1 text-base">Welcome back,
                        <span class="text-blue-500">{{ ucwords(auth()->user()->name) }}
                        </span>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <span
                                    class="ml-1 cursor-pointer rounded-full border border-blue-500 bg-gray-100 px-2 py-1 text-xs font-bold text-blue-500">v</span>
                            </x-slot>
                            @admin
                                <x-dropdown-item href="/admin/post" :active="active_view('admin/post')">Dashboard</x-dropdown-item>
                                <x-dropdown-item href="/admin/categories/create">New Category</x-dropdown-item>
                                <x-dropdown-item href="/admin/post/create" :active="active_view('admin/post/create')">
                                    New Post
                                </x-dropdown-item>
                            @endadmin
                            <x-dropdown-item>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit">
                                        Logout
                                    </button>
                                </form>
                            </x-dropdown-item>
                        </x-dropdown>
                    </div>
                @elseif (request()->route()->uri === 'register')
                    <a href="/login" class="ml-6 text-sm font-bold uppercase">Login</a>
                @elseif (request()->route()->uri === 'login')
                    <a href="/register" class="text-sm font-bold uppercase">Register</a>
                @else
                    {{-- Show when user is guest and in the homepage --}}
                    <a href="/register" class="text-sm font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-sm font-bold uppercase">Login</a>
                @endauth

                <a href="#subscribed"
                    class="ml-3 rounded-full bg-blue-500 px-5 py-3 text-xs font-semibold uppercase text-white">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="mt-16 rounded-xl border border-black border-opacity-5 bg-gray-100 px-10 py-16 text-center">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative mx-auto inline-block rounded-full lg:bg-gray-200">

                    <form method="POST" action="/newsletter" class="items-center text-sm lg:flex" id="subscribed">
                        @csrf

                        <div class="flex items-center lg:px-5 lg:py-3">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                class="py-2 pl-4 focus-within:outline-none lg:bg-transparent lg:py-0">
                        </div>

                        <button type="submit"
                            class="mr-2 mt-4 rounded-full bg-blue-500 px-8 py-3 text-xs font-semibold uppercase text-white transition-colors duration-300 hover:bg-blue-600 lg:ml-3 lg:mt-0">
                            Subscribe
                        </button>
                    </form>
                    @error('email')
                        <p class="mt-1 text-left text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </footer>
    </section>

    <x-flash :status="session('status')" :message="session('message')" />
</body>

</html>
