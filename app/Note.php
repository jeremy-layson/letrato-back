<?php

namespace App;

use App\AbstractModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends AbstractModel
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'type',
        'text',
        'noteable_id',
        'noteable_type',
    ];

    protected $appends = [

    ];

    public function noteable()
    {
        return $this->morphTo();
    }
}
