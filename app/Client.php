<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'address',
        'fb_message_id',
        'company_id',
    ];

    protected $appends = [

    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function finishedOrders()
    {
        return $this->hasMany('App\Order')->whereStatus('paid')->orderBy('delivery_date', 'DESC');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
