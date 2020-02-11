<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function notes()
    {
        return $this->morphMany('App\Note', 'noteable');
    }
}
