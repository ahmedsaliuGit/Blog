<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Post $post) {
        request()->validate([
            'body' => ['required', 'string', 'min:5', 'max:255'],
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body'),
        ]);

        return back();
    }
}
