<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public static function find($slug)
    {
        if (!file_exists($filePath = resource_path("post/{$slug}.html"))) {
            abort(404);
        }

        // cache the filepath content for 20 seconds
        return cache()->remember("post.{$slug}", now()->addSeconds(30), fn() => file_get_contents($filePath));

    }
}