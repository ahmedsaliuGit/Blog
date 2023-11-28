<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters) {
        $search = isset($filters['search']) ? $filters['search'] : '';
        $category = isset($filters['category']) ? $filters['category'] : '';
        $author = isset($filters['author']) ? $filters['author'] : '';
        
        $query->when($search, function ($query, $search) {
            $query->where(function($query) use ($search){
                $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%');
            });
        });
        
        // $query->when($category, function ($query, $category) {
        //     $query->whereExists(function($query) use ($category) {
        //         $query->from('categories')
        //             ->whereColumn('categories.id', 'posts.category_id')
        //             ->where('categories.slug', $category);
        //     });
        // });

        $query->when($category, function($query, $category) {
            $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($author, function($query, $author) {
            $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Keeps this here for remembering
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
