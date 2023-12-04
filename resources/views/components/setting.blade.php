@props(['heading'])
<x-panel class="max-w-4xl mx-auto mt-6">
    <x-form-title>{{ $heading }}</x-form-title>

    {{ $slot }}
</x-panel>                  