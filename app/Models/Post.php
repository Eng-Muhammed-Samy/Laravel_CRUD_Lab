<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'desc',
        'image'
    ];
    protected $hidden = [
        'created_at',
        'update_at',
    ];
    protected $dates = [
        'deleted_at'
    ];

}
