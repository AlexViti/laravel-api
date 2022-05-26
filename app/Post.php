<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'slug',
    ];

    static public function generateSlug(string $title) :string {
        $baseSlug = Str::of($title)->slug('-');
        $i = 1;
        $slug = $baseSlug;
        while (self::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $i++;
        }
        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setSlug($value)
    {
        $this->slug = self::generateSlug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
