<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable. Attributes that will be stored in DB.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];
}
