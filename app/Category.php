<?php

namespace App;

use App\AbstractModel;

class Category extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'base_cost',
        'discount_quantity',
        'discount_amount',
    ];

    protected $appends = [

    ];

    public function inquiries()
    {
        return $this->hasMany('App\Models\Inquiry');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
