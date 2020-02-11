<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentHistory extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'amount',
        'method',
        'type',
        'details',
        'order_id',
        'client_id',
        'payment_id'
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

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    }
}
