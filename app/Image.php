<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'information',
        'imageable_id',
        'imageable_type',
    ];

    protected $appends = [

    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
