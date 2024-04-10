@props(['name'])

<div>
    <x-form.label name="{{ $name }}" />
    <div class="mt-2">
        <input id="{{ $name }}" name="{{ $name }}" {{ $attributes(['value' => old($name)]) }} required
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
    </div>
    <x-form.error name="{{ $name }}" />
</div>
