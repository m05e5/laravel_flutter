<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userWithTag extends Model
{
    use HasFactory;
    protected $table = "user_with_tags";
    protected $fillable = [
        'tag_id'
    ];
}
