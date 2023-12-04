@props(['name', 'noLabel' => 'true'])
<x-form.field>
    @if ($noLabel === "true")
        <x-form.label name="{{ $name }}" />
    @endif

    <textarea 
        {{ $attributes(['class' => 'w-full']) }}
        name="{{ $name }}"
        id="{{ $name }}"
        required>{{ old($name) }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>