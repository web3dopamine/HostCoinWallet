<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_detail extends Model
{
    protected $fillable = [
        'user_id', 'address', 'balance', 'public_key', 'private_key'
    ];
}
