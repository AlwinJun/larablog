<div class="relative rounded-xl bg-gray-100 lg:inline-flex">
    <x-dropdown>
        <x-slot name="trigger">
            <button type="button" class="flex w-full py-2 pl-3 text-left text-sm font-semibold lg:inline-flex lg:w-36">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Category' }}

                <x-svg.down-arrow class="pointer-events-none absolute" style="right: 12px;" />
            </button>
        </x-slot>

        {{-- default slot: items --}}
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}"
            :active="!isset($currentCategory)">All</x-dropdown-item>
        @foreach ($categories as $category)
            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active="$category->is($currentCategory)">
                {{ ucwords($category->name) }}</x-dropdown-item>
        @endforeach
    </x-dropdown>
</div>
