<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemDetail extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'part',
        'style',
        'color',
        'gemstone',
        'layer',
        'pieces',
        'other_information',
        'order_id',
        'order_item_id',
    ];

    protected $appends = [

    ];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function item()
    {
        return $this->belongsTo('App\OrderItem', 'order_item_id');
    }
}
