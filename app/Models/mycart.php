<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class mycart extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'orderStatus',
        'mount'
    ];
    public function product()
    {return $this->belongsTo(product::class);
    }
    public function user()
    {return $this->belongsTo(User::class);
    }
}
