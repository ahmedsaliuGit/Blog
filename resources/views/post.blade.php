<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>

        <x-author-link>
            <x-slot name="author_username">{{ $post->author->username }}</x-slot>
            <x-slot name="author_name">{{ $post->author->name }}</x-slot>
            <x-slot name="category_slug">{{ $post->category->slug }}</x-slot>
            <x-slot name="category_name">{{ $post->category->name }}</x-slot>
        </x-author-link>


        <div>{!! $post->body !!}</div>

    </article>

    <a href="{{ url('/') }}">Go Back</a>
</x-layout>
