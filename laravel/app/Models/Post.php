<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
    {
        // request(['search']) will be past to $filters array which is the query scope bellow
        // $query is a build-in laravel query build
        //later on if I have any other filter to the posts add them here

        /*if ($filters['search'] ?? false){
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }*/

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' .$search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->where('title', 'like', '%' . $category . '%')
                ->orWhere('body', 'like', '%' .$category . '%');
        });

    }
    public function category(){

        //relationships types - hasOne, hasMany, belongsTo, belongsToMany

        return $this->belongsTo(Category::class);

    }

    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }




}
