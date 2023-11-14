<x-layout>
    <article>
        <h1>{!! $post->title !!}</h1>

        <p><a href="{{ url('/categories' . '/' . $post->category->slug) }}">{{ $post->category->name; }}</a></p>



        <div>{!! $post->body !!}</div>

    </article>

    <a href="{{ url('/') }}">Go Back</a>
</x-layout>
