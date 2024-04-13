<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminPostRequest;
use App\Http\Requests\UpdateAdminPostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', ['posts' => Post::paginate(50)]);
    }

    public function create()
    {
        return view('admin.post.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(StoreAdminPostRequest $request)
    {
        $attributes = $request->validated();

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        // Redirect to the created post
        return redirect()->route('post.show', ['post' => $attributes['slug']])->with(['status' => 'success', 'message' => 'Post created!']);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(UpdateAdminPostRequest $request, Post $post)
    {

        $attributes = $request->validated();

        $attributes['slug'] = Str::slug($attributes['title']);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        // Redirect to the created post
        return redirect()->route('post.show', ['post' => $attributes['slug']])->with(['status' => 'success', 'message' => 'Post updated!']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with(['status' => 'danger', 'message' => 'Post deleted']);
    }
}