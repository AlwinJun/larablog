@props(['name', 'options'])

<div>
    <x-form.label name="{{ $name }}" />
    <select name="{{ $name }}_id" id="{{ $name }}" class="w-full">
        <option value="">Select category</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{ old("{$name}_id") == $option->id ? 'selected' : '' }}>
                {{ $option->name }}</option>
        @endforeach
    </select>
    <x-form.error name="{{ $name }}_id" />
</div>
