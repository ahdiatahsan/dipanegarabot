<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'floor',
    ];

    public function lecture()
    {
        return $this->hasOne('App\Lecture');
    }
}
