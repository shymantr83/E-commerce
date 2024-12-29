<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class product extends Model
{
    protected $fillable = [
        'id',
        'name',
'price',
'image',
'discription',	
'category_id',
'productMount'
    ];
    public function category()
    {return $this->belongsTo(category::class);
    }
}
