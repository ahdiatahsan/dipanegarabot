<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformationCategory extends Model
{
    protected $fillable = [
        'name', 'detail',
    ];

    public function information()
    {
        return $this->hasMany('App\Information');
    }
}
