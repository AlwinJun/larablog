<div x-data="{ show: false }">
    {{-- trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- item --}}
    <div x-show="show" class="absolute z-10 w-full py-2 bg-gray-100 rounded-xl mt-2" style="display: none">
        {{ $slot }}
    </div>
</div>
