@props(['heading'])

<section class="mx-auto max-w-4xl space-y-6">
    <h1 class="sente mb-4 border-b pb-2 text-xl font-bold capitalize">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-52 flex-shrink-0">
            <h4 class="mb-4 text-lg font-semibold">Links</h4>
            <ul class="space-y-1 [&>*:not(:last-child)]:border-b [&>*]:pb-2">
                <li>
                    <a href="{{ route('admin.post.index') }}"
                        class="{{ active_view('admin.post.index') ? 'text-blue-500' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="{{ active_view('#') ? 'text-blue-500' : '' }}">
                        New Category
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.post.create') }}"
                        class="{{ active_view('admin.post.create') ? 'text-blue-500' : '' }}">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>
        <main class="mt-0 flex-1">{{ $slot }}</main>
    </div>
</section>
