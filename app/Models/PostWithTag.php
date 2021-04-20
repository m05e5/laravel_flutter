<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostWithTag extends Model
{
    use HasFactory;
    protected $table = "post_with_tags";
    protected $fillable = [
        'tag_id'
    ];
}
