@props(['name'])

<div>
    <x-form.label name="{{ $name }}" />
    <textarea id="{{ $name }}" name="{{ $name }}"
        class="overflow-au h-16 w-full resize-none rounded-xl focus:h-24" required>{{ old($name) ?? $slot }}</textarea>
    <x-form.error name="{{ $name }}" />
</div>
