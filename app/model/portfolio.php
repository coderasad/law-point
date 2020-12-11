<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    protected $fillable = [
        'img','title','portfoliocategory_id','status'
    ];  
    public function category()
    {
        return $this->hasOne(portfoliocategory::class,'id','portfoliocategory_id');
    }
}
