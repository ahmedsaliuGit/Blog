<x-layout>

    @foreach ($posts as $post)
    <article>
        <h1><a href="/posts/{{ $post->slug; }}">{!! $post->title !!}</a></h1>

        <div>
            {!! $post->excerpt; !!}

        </div>

        <x-author-link>
            <x-slot name="author_username">{{ $post->author->username }}</x-slot>
            <x-slot name="author_name">{{ $post->author->name }}</x-slot>
            <x-slot name="category_slug">{{ $post->category->slug }}</x-slot>
            <x-slot name="category_name">{{ $post->category->name }}</x-slot>
        </x-author-link>

    </article>
    @endforeach


</x-layout>
