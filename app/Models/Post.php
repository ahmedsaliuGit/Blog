<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $date;
    public $excerpt;
    public $slug;
    public $body;

    public function __construct($title, $date, $excerpt, $slug, $body) {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function all() {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("/posts")))
                ->map(function($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function($document) {

                    return new Post(
                        $document->title,
                        $document->date,
                        $document->excerpt,
                        $document->slug,
                        $document->body(),
                    );
                })
                ->sortByDesc('date');
        });
    }

    public static function find($slug)  {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)  {
        $post = static::find($slug);
        
        if(!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}