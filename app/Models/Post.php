<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
// use Illuminate\Database\Eloquent\Model;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post
{
    use HasFactory;

    public function __construct(public $title, public $exerpt, public $date, public $slug, public $body)
    {
        $this->title = $title;
        $this->exerpt = $exerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function all()
    {
        $files = File::files(resource_path("post/"));

        $post = array_map(function ($file) {
            $document = YamlFrontMatter::parseFile($file);

            return new Post(
                $document->title,
                $document->exerpt,
                $document->date,
                $document->slug,
                $document->body()
            );

        }, $files);

        return $post;

        // return array_map(fn($file) => $file->getContents(), $files);
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