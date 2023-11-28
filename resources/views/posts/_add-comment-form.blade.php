 @auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="User Avatar" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Do you want to participate?</h2>
            </header>

            <div class="mt-4">
                <textarea 
                    name="body"
                    rows="5"
                    class="w-full text-sm focus:outline-none focus:ring"
                    placeholder="Quick, think of something to say!"
                    required></textarea>
                
                    @error('body')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
            </div>

            <div class="pt-6 mt-2 flex justify-end border-t border-gray-200">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login</a> to leave a comment.
    </p>
@endauth