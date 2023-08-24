<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt','user_id', 'body', 'slug', 'category_id'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
        // request(['search']) will be past to $filters array which is the query scope bellow
        // $query is a build-in laravel query build
        //later on if I have any other filter to the posts add them here

        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'))
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );
        //eloquent tip: speak out loud to avoid confusion
        //so we are dealing with posts
        //give me the ones where they have (whereHas) a category
        //specifically where the category's slug matches what user requested ($category)

        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author))
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category()
    {
        //relationships types - hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
