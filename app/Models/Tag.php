<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Tag extends Model
{
    use HasFactory;
    
    protected $table = "tags";
    protected $fillable = [
        'name',
        'description',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'users_with_tags');
    }
    public function posr()
    {
        return $this->belongsToMany(Post::class, 'post_with_tags');
    }
}
