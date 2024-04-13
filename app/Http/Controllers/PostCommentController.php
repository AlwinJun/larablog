<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostCommentRequest;
use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post, StorePostCommentRequest $request)
    {
        $validated = $request->validated();


        $post->comments()->create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $validated['body']
        ]);

        return back();
    }
}