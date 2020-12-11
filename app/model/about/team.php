<?php

namespace App\model\about;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    protected $fillable = [
        'title','name','img','fb_link','tw_link','in_link','status'
    ];
}
