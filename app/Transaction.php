<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'address_from', 'address_to', 'amount','description'
    ];
}
