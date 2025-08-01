<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
