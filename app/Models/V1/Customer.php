<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_customer',
        'email_customer',
        'phone_customer',
        'birth_customer',
        'password_customer',
        'address_customer',
        'avatar_customer',
    ];

    protected $primaryKey = 'id_customer';
    protected $table = 'customer';
}
