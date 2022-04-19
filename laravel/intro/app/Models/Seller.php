<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory;
    use SoftDeletes;

//    protected $fillable = [
//        'code',
//        'dni',
//        'first_name',
//        'last_name',
//        'phone',
//    ];

    protected $guarded = [];
}
