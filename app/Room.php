<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name', 'floor', 'building'
    ];

    public function lecture()
    {
        return $this->hasOne('App\Lecture');
    }
}
