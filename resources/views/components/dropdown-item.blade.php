@props(['active' => false])

@php
    $defaultClass = 'block text-left px-3 text-sm leading-6 hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';
    $activeClass = 'bg-blue-500 text-white';
@endphp

{{-- add activeClass to the defaultClass if active is truthy --}}
<a {{ $attributes->class([$defaultClass, $activeClass => $active]) }}> {{ $slot }} </a>
