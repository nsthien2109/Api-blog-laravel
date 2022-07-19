<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_post',
        'comment_content',
        'username',
        'avatar_link'
    ];

    protected $primaryKey = 'id_comment';
    protected $table = 'comments';
}
