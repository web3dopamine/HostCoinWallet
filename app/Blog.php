<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;
    protected $fillable = [
            'title', 'description', 'image', 'tags','likes'
        ];
}
