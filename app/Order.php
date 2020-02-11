<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'order_number',
        'item_discount',
        'order_discount',
        'total_discount',
        'total',
        'payable',
        'address',
        'delivery_date',
        'event_date',
        'contact_person',
        'contact_number',
        'delivery_method',
        'delivery_fee',
        'delivery_tracking',
        'is_free_shipping',
        'delivered_at',
        'status',
        'logo',
        'manager_id',
        'company_id',
        'client_id',
        'pending_at',
        'confirmed_at',
        'finished_at',
        'fullpaid_at',
        'delivered',
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

    public function manager()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function histories()
    {
        return $this->hasMany('App\PaymentHistory', 'order_id');
    }
}
