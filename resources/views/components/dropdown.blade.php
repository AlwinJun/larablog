<div x-data="{ show: false }">
    {{-- trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- item --}}
    <div x-show="show" x-transition x-cloak
        class="absolute z-10 mt-2 max-h-56 w-full overflow-auto rounded-xl bg-gray-100 py-2" style="display: none">
        {{ $slot }}
    </div>
</div>
