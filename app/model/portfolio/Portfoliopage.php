<?php

namespace App\model\portfolio;
use App\model\portfoliocategory;

use Illuminate\Database\Eloquent\Model;

class Portfoliopage extends Model
{
    protected $fillable = [
        'long_title','short_title','category_id','website','client','short_description','description1','description2','img','status'
    ];
    public function category()
    {
        return $this->hasOne(portfoliocategory::class,'id','category_id');
    }
}
