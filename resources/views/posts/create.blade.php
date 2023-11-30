<x-layout>
    <x-panel class="max-w-sm mx-auto">
        <x-form-title>Post!</x-form-title>

        <form action="/admin/posts" method="POST">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Title
                </label>

                <input type="text" 
                    class="border border-gray-400 p-2 w-full"
                    name="title"
                    id="title"
                    value="{{ old('title') }}"
                    required>
                @error('title')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Slug
                </label>

                <input type="text" 
                    class="border border-gray-400 p-2 w-full"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    required>
                @error('slug')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Category
                </label>

                <select class="border border-gray-400 p-2 w-full text-xs" id="category_id" name="category_id">
                    <option value="">Select Category</option>
                    @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                @error('excerpt')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Excerpt
                </label>

                <textarea 
                    class="border border-gray-400 p-2 w-full"
                    name="excerpt"
                    id="excerpt"
                    required>{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    Body
                </label>

                <textarea 
                    class="border border-gray-400 p-2 w-full"
                    name="body"
                    id="body"
                    required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-panel>
</x-layout>
