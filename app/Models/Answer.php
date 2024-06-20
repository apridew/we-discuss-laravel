<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Conner\Likeable\Likeable;

class Answer extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'user_id',
        'discussion_id',
        'answer',
    ];
}
