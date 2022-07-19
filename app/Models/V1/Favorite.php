<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_post',
        'id_customer',
        'status'
    ];

    protected $primaryKey = 'id_favorite';
    protected $table = 'favorite';
}
