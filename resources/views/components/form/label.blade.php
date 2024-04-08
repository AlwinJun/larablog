@props(['name'])

<label for="{{ $name }}" class="mb-1 block text-sm font-semibold leading-6 text-gray-900">
    {{ ucwords($name) }}
</label>
