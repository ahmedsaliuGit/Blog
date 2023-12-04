 @auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="User Avatar" width="40" height="40" class="rounded-full">
                <h2 class="ml-4">Do you want to participate?</h2>
            </header>

            <x-form.textarea
                name="body"
                noLabel="false"
                rows="5"
                class="text-sm focus:outline-none focus:ring"
                placeholder="Quick, think of something to say!" />

            <div class="pt-6 mt-2 flex justify-end border-t border-gray-200">
                <x-form.button>
                    Post
                </x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Login</a> to leave a comment.
    </p>
@endauth