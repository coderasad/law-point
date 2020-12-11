<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $fillable = [
        'img','description','title','status'
    ];
}
