@props(['name', 'options', 'currentOption' => null])

<div>
    <x-form.label name="{{ $name }}" />
    <select name="{{ $name }}_id" id="{{ $name }}" class="w-full">
        <option value="">Select category</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}" {{--  select old category, if there is no old data $currentOption?->category->id will get the category in the db to be edited --}}
                {{ old("{$name}_id", $currentOption?->category->id) == $option->id ? 'selected' : '' }}>
                {{ $option->name }}</option>
        @endforeach
    </select>
    <x-form.error name="{{ $name }}_id" />
</div>
