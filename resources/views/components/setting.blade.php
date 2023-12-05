@props(['heading'])

    
<div class="flex mt-10 max-w-4xl mx-auto">
    <aside class="w-48 flex-shrink-0 mt-6">
        <h4 class="font-semibold mb-4">Links</h4>
        <ul>
            <li class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}"><a href="/admin/posts">All Post</a></li>
            <li class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}"><a href="/admin/posts/create">New Post</a></li>
        </ul>
    </aside>

    <main class="flex-1">
        <x-form-title>{{ $heading }}</x-form-title>
        {{ $slot }}
    </main>
</div>                