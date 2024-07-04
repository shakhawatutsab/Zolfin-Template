<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'thumbnail',
        'content',
        'excerpt',
        'user_id',
        'views',
        'user_id',
    ];

}
