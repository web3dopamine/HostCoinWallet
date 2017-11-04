<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'tranx_id', 'address_from', 'address_to', 'amount', 'spent','description'
    ];
}
