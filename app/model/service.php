<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = [
        'img','description','title','status'
    ];
}
