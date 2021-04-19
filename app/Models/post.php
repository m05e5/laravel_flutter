<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tag;

class post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'title',
        'description',
        'imgUrl',
    ];

    public function tag()
    {
        return $this->hasMany(Tag::class, 'post_with_tags');
    }
}
