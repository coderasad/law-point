<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class topbar extends Model
{
    protected $fillable = [
        'phone','news','fb_link','tw_link','in_link'
    ];
}
