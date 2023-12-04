<x-layout>
    <x-setting heading="Publish New Post">
        <div class="flex">
            <aside class="w-48">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul>
                    <li><a href="/admin/dashboard">Dashboard</a></li>
                    <li class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}"><a href="/admin/posts/create">New Post</a></li>
                </ul>
            </aside>
            <main class="flex-1">
                <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.field>
                        <x-form.label name="category" />
                        <select class="border border-gray-200 p-2 w-full text-xs" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        <x-form.error name="category_id" />
                    </x-form.field>
                    <x-form.input name="thumbnail" type="file" />
                    <x-form.textarea name="excerpt" class="border border-gray-200 p-2" />
                    <x-form.textarea name="body" class="border border-gray-200 p-2" />
                    <x-form.field>
                        <x-form.button>Publish</x-form.button>
                    </x-form.field>
                </form>
            </main>
        </div>
    </x-setting>
</x-layout>
