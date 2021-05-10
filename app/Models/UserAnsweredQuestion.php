<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnsweredQuestion extends Model
{
    use HasFactory;
    protected $table = "user_answered_questions";
    protected $fillable = [];
}
