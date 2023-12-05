<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class AdminPostController extends Controller
{

    public function index() {
        return view('admin.posts.index', ['posts' => Post::paginate(50)]);
    }

    public function create() {
        // if(auth()->guest()) return abort(Response::HTTP_FORBIDDEN);

        // if(auth()->user()) {
        //     if(auth()->user()->username !== 'ahmedabbey') return abort(Response::HTTP_FORBIDDEN);
        // }

        return view('admin.posts.create');
    }

    public function store() {

        $attributes = array_merge($this->validatePost(), [
            'user_id' => auth()->id(),
            'thumbnail' => request()->file('thumbnail')->store('thumbnail')
        ]);

        Post::create($attributes);

        return redirect('/')->with('success', 'Post published!');
    }

    public function edit(Post $post) {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {
        $attributes = $this->validatePost();

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted successfully');
    }

    protected function validatePost(?Post $post = null) {
        $post = $post ?: new Post();

        return request()->validate([
            'title' => ['required', 'string'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
    }
}
