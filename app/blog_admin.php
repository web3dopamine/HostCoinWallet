<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_admin extends Model
{
    protected $fillable = [
        'username', 'password',
        ];
}
