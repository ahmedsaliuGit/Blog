<x-layout>

    @foreach ($posts as $post)
    <article>
        <h1><a href="/posts/{{ $post->slug; }}">{!! $post->title !!}</a></h1>

        <div>
            {{ $post->excerpt; }}

        </div>

        <p><a href="{{ url('/categories' . '/' . $post->category->slug) }}">{{ $post->category->name; }}</a></p>

    </article>
    @endforeach


</x-layout>
