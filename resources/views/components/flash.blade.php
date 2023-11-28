@if(session()->has('success'))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
    class="fixed bottom-3 right-3 rounded-xl px-4 py-2 bg-blue-500">
        <p class="text-sm text-white">{{ session('success') }}</p>
    </div>
@endif