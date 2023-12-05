<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <x-panel class="mt-6">
            <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="title" :value="old('title', $post->title)" required/>
                <x-form.input name="slug" :value="old('slug', $post->slug)" required/>
                <x-form.field>
                    <x-form.label name="category" />
                    <select class="border border-gray-200 p-2 w-full text-xs" id="category_id" name="category_id">
                        <option value="">Select Category</option>
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id" />
                </x-form.field>
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>

                    <img src="{{ $post->thumbnail !== null ? asset("/storage/" . $post->thumbnail) : asset('images/illustration-1.png')  }}" alt="Blog Post illustration" class="rounded-xl ml-6" width="100">
                </div>
                <x-form.textarea name="excerpt" class="border border-gray-200 p-2">{{ old('excerpt', $post->excerpt)}}</x-form.textarea>
                <x-form.textarea name="body" class="border border-gray-200 p-2">{{ old('body', $post->body)}}</x-form.textarea>
                <x-form.field>
                    <x-form.button>Update</x-form.button>
                </x-form.field>
            </form>
        </x-panel>
    </x-setting>
</x-layout>
