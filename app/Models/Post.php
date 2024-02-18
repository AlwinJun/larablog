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
        return cache()->rememberForever("post.all", function () {

            // collect all the file in resourse/post directory and store it as an array
            //map for each file and parse them
            //map it again then pass the metadatas in the Post object
            return collect(File::files(resource_path("post/")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(
                    fn($document) => new Post(
                        $document->title,
                        $document->exerpt,
                        $document->date,
                        $document->slug,
                        $document->body()
                    )
                )
                ->sortByDesc("date");
        });
    }

    public static function find($slug)
    {
        return static::all()->where("slug", $slug)->first();
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}