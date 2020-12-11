<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class welcome extends Model
{
    protected $fillable = [
        'title','sub_title','description','p1','p2','p3','img'
    ];
}
