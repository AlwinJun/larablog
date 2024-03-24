<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];


    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($query) =>
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('exerpt', 'like', "%{$search}%")
            )

        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas(
                'category',
                fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas(
                'author',
                fn($query) =>
                $query->where('username', $author)
            )
        );


    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderByDesc('created_at');
    }

}