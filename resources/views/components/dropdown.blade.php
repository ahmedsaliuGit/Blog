@props(['trigger'])

<div x-data="{show: false}" @click.away="show = false" class="relative">
    <div @click=" show = !show" class="cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 bg-gray-100 absolute w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">
        {{ $slot }}
    </div>
</div>
