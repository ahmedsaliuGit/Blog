<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        // if(auth()->guest()) return abort(Response::HTTP_FORBIDDEN);

        // if(auth()->user()) {
        //     if(auth()->user()->username !== 'ahmedabbey') return abort(Response::HTTP_FORBIDDEN);
        // }

        return view('posts.create');
    }

    public function store() {
        $attributes = request()->validate([
            'title' => ['required', 'string'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }
}
