<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
