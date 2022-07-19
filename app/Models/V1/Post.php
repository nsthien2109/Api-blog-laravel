<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_post',
        'sub_post',
        'description_post',
        'image_post',
        'id_category',
    ];

    protected $primaryKey = 'id_post';
    protected $table = 'posts';
}
