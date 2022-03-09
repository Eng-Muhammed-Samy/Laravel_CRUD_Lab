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
        'title',
        'description',
        'image',
        'user_id'
    ];
    protected $hidden = [
        'created_at',
        'update_at',
    ];
    protected $dates = [
        'deleted_at'
    ];
    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
function user(){
    return $this::belongsTo(User::class);
}
}
