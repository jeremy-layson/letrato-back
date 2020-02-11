<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'tax',
        'is_paid',
        'order_id',
        'client_id',
        'downpayment_at',
        'fullpaid_at',
    ];

    protected $appends = [

    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function histories()
    {
        return $this->hasMany('App\PaymentHistory', 'payment_id');
    }
}
