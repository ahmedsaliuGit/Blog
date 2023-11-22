<x-layout>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
        <x-post-feature-card :post="$posts[0]" />

        @if($posts->count() > 1)
        <x-posts-grid :posts="$posts" />
        @endif
        @else
        <p class="text-center">No post at the moment, please check back later.</p>
        @endif
    </main>


</x-layout>
