<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'per_piece',
        'discount',
        'count',
        'total',
        'payable',
        'product_name',
        'product_details',
        'status',
        'category_id',
        'order_id',
        'company_id',
        'client_id',
        'centerpiece',
        'centerpiece_note',
        'necklace',
        'necklace_note',
        'item_note',
        'logo'
    ];

    protected $appends = [

    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function details()
    {
        return $this->hasMany('App\ItemDetail');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
