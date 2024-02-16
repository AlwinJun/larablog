<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    use HasFactory;

    public static function all()
    {
        $files = File::files(resource_path("post/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        if (!file_exists($filePath = resource_path("post/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        // cache the filepath content for 20 seconds
        return cache()->remember("post.{$slug}", now()->addSeconds(30), fn() => file_get_contents($filePath));

    }
}