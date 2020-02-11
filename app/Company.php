<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'website',
        'facebook'
    ];

    protected $appends = [

    ];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
