<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company',
        'fb_message_id',
        'email',
        'channel',
        'has_not_pushed_through',
        'reason',
        'pieces',
        'category_id'
    ];

    protected $appends = [

    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
