<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|unique:posts,title',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg,svg',
            'exerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        // Redirect to the created post
        return redirect("/post/{$attributes['slug']}")->with(['status' => 'success', 'message' => 'Post created!']);
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post->id)],
            'thumbnail' => 'image|mimes:png,jpg,jpeg,svg',
            'exerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        // Redirect to the created post
        return redirect("/post/{$attributes['slug']}")->with(['status' => 'success', 'message' => 'Post updated!']);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with(['status' => 'danger', 'message' => 'Post deleted']);
    }

}