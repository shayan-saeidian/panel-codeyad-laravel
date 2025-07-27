<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments_show(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
