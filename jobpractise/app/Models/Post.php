<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title',
        'description',
        'name',
        'post_status',
        'usertype',
        'user_id',
    ];

}
