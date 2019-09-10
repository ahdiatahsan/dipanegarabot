<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'name', 'filename','type',
    ];

    public function information()
    {
        return $this->hasMany('App\Information');
    }
}
