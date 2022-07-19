<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_category',
    ];

    protected $primaryKey = 'id_category';
    protected $table = 'category_posts';
}
